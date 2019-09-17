<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Session;
use DB;
use SoapClient;

class PalaceController extends Controller
{
private $xmlreq=<<<XML
<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><Post_ObtenerInfoRoomPorHabitacion xmlns="http://localhost/xmlschemas/postserviceinterface/16-07-2009/"><RmroomRequest xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/RmroomRequest.xsd"><Rmroom><hotel xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></hotel><room xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></room></Rmroom><rooms /></RmroomRequest></Post_ObtenerInfoRoomPorHabitacion></soap:Body></soap:Envelope>
XML;

    public function login_palace(Request $request)
    {
    	//Agent
    	  $agent = new Agent(); // datos del usuario.
        $bool = $agent->isDesktop();
        if($bool){
          $mobile = 0;
        }else{
          $mobile = 1;
        }
        $device = $agent->device();
        $robot = $agent->isRobot();
        if ($robot) {
          $robot_name = $agent->robot();
        }else{
          $robot_name = '';
        }
        // $robot = $agent->robot();
        $languages = $agent->languages();
        if (count($languages) > 0) {
        	$lang = $languages[0];
        }else{
        	$lang = '';
        }
        $browser = $agent->browser();
        $browser_version = $agent->version($browser);
        $platform = $agent->platform();
        if ($agent->version($platform)) {
          $platform_version = $agent->version($platform);
        }else{
          $platform_version = '';
        }
      //Fin Agent
      //Parámetros de logeo
      	$url = $request->url;
      	$proxy = $request->proxy;
      	$sip = $request->sip;
      	$mac = $request->mac;
      	$client_mac = $request->client_mac;
      	$uip = $request->uip;
      	$ssid = $request->ssid;
      	$vlan = $request->vlan;
      	$res = $request->res;
      	$auth = $request->auth;
      	$site = $request->site_code;
      	$username = $request->username;
      	$username1 = $request->username1; // Room number.
      	$password = $request->password1; // Apellido.
    	//Fin parámetros.
    	  $lastname_clean = $this->cleanString($password);
    	  $lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");
        $lastname = $this->cleanString($password);
        $lastname = str_replace(' ', '', $lastname);
        $lastname = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");
        $usuariojunto = $lastname . $username1;
        $usuariojunto = $this->cleanString($usuariojunto);
        $fechain = date("Y-m-d H:i:s");
    	// database connection "sunrisezq".
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;
  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	// $temporal = 'GUEST9999';
      if ($site === 'ZCJG') {
        if ($usuariojunto === 'GUEST9999' || $usuariojunto === 'GUEST8888') {
          $usuariojunto = 'MALCODIGO';
          return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
        }
      }
  		if ($db_user > 0) {
  			// Existe.
  			//insercion de Agent.
  			DB::table('data_agents')->insert([
  				'mac_address' => $client_mac,
  				'browser' => $browser,
  				'browser_version' => $browser_version,
  				'platform' => $platform,
  				'platform_version' => $platform_version,
  				'wificode' => $usuariojunto,
  				'device' => $device,
  				'language' => $lang,
  				'robot' => $robot_name,
  				'site_id' => $site_info[0]->id,
  				'mobile' => $mobile,
  				'success' => 1
  			]);
  			return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
  		}else{
  			// No existe.
  	    	$XMLresponse = $this->getInfoxHab($username1, $site);
  	        $XMLresponse = str_replace('xmlns=', 'ns=', $XMLresponse);
  	        $XMLsimple = simplexml_load_string($XMLresponse);

  			$xml_for = $XMLsimple->xpath('//RmFolio');

  			if (empty($xml_for)) {
  				// No existe.
  				DB::table('data_agents')->insert([
  					'mac_address' => $client_mac,
  					'browser' => $browser,
  					'browser_version' => $browser_version,
  					'platform' => $platform,
  					'platform_version' => $platform_version,
  					'wificode' => $usuariojunto,
  					'device' => $device,
  					'language' => $lang,
  					'robot' => $robot_name,
  					'site_id' => $site_info[0]->id,
  					'mobile' => $mobile,
  					'success' => 0,
  				]);
  				$response = 'insertar en data_agents con logeo normal';

  				return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
  			}else{
  				// Existe.
  				foreach ($xml_for as $RmFolio) {
  					// empty($RmFolio->Rmfolio->last_name) ? $ApeXML = '' : $ApeXML = $RmFolio->Rmfolio->last_name;
  					$ApeXML = $RmFolio->Rmfolio->last_name;
  					// empty($RmFolio->Rmfolio->first_name) ? $NombreXML = '' : $NombreXML = $RmFolio->Rmfolio->last_name;
  					$NombreXML = $RmFolio->Rmfolio->first_name;
  					// empty($RmFolio->Rmfolio->nights) ? $nochesXML = '' : $nochesXML = $RmFolio->Rmfolio->nights;
  					$nochesXML = $RmFolio->Rmfolio->nights;
  				}
                  $ApeXML = $this->cleanString($ApeXML);
                  $ApeXML = mb_convert_case($ApeXML, MB_CASE_UPPER, "UTF-8");

                  $NombreXML = $this->cleanString($NombreXML);
                  $NombreXML = mb_convert_case($NombreXML, MB_CASE_UPPER, "UTF-8");

                  $nochesXML = $nochesXML +1;
                  $noches = "+" . $nochesXML . " day";
                  $fechaout = strtotime ( $noches , strtotime ( $fechain ) ) ;
                  $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );
                  if($ApeXML === $lastname_clean){
                      // echo " _si existe en el PMS ";
  					DB::table('data_agents')->insert([
  						'mac_address' => $client_mac,
  						'browser' => $browser,
  						'browser_version' => $browser_version,
  						'platform' => $platform,
  						'platform_version' => $platform_version,
  						'wificode' => $usuariojunto,
  						'device' => $device,
  						'language' => $lang,
  						'robot' => $robot_name,
  						'site_id' => $site_info[0]->id,
  						'mobile' => $mobile,
  						'success' => 1,
  						'expiration' => $fechaout
  					]);
  					DB::table('data_sites')->insert([
  						'lastname' => $lastname_clean,
  						'wificode' => $usuariojunto,
  						'site_id' => $site_info[0]->id,
  						'expiration' => $fechaout
  					]);
                      $this->insertRadCloud($usuariojunto, $NombreXML, $lastname_clean, $fechaout, $site);
                      //$this->insertRadSunrise($usuariojunto, $NombreXML, $lastname, $fechaout, $site);
                      usleep(5000);
                      $response = 'debio insertar en cloud';
                      return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
                  }else{
                      // echo " _no existe en el PMS__?? raro  ";
  					DB::table('data_agents')->insert([
  						'mac_address' => $client_mac,
  						'browser' => $browser,
  						'browser_version' => $browser_version,
  						'platform' => $platform,
  						'platform_version' => $platform_version,
  						'wificode' => $usuariojunto,
  						'device' => $device,
  						'language' => $lang,
  						'robot' => $robot_name,
  						'site_id' => $site_info[0]->id,
  						'mobile' => $mobile,
  						'success' => 0,
  					]);
  					// DB::table('data_sites')->insert([
  					// 	'lastname' => $lastname,
  					// 	'wificode' => $usuariojunto,
  					// 	'site_id' => $site_info[0]->id
  					// ]);
                      $response = 'Nada de nada';
                      return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
                  }
  			}
  		}
    }
    public function replaceXML($roominfo, $site_code){
        //echo " _entre a replaceXML";
        $xmlinfo = $this->xmlreq;
        //var_dump($xmlinfo);
        //echo " Cargue el XML ";

        $stringXML = str_replace('xmlns=', 'ns=', $xmlinfo);
        //echo " remplaze xmlns ";
        //var_dump($string);
        $xmltest = simplexml_load_string($stringXML);
        //echo " cargue el simplexml ";

        foreach ($xmltest->xpath('//Rmroom') as $Rmroom) {
            $Rmroom->hotel = $site_code;// <---- Agregar la variable dinamica de Hoteles!
            $Rmroom->room = $roominfo; // <---- Aqui es donde va la variable dinamica
        }
        //echo " pase de FOR__? ";
        $XMLenString = $xmltest->asXML();
        $XMLreq2 = str_replace('ns=', 'xmlns=', $XMLenString);
        //var_dump($XMLreq2);

        return $XMLreq2;
    }
    public function getInfoxHab($roominfo, $site_code){
        //echo " _entre a getinforoom ";
        $xml = $this->replaceXML($roominfo, $site_code);
        $wsdlloc = "http://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl";
        $accion = "http://localhost/xmlschemas/postserviceinterface/16-07-2009/Post_ObtenerInfoRoomPorHabitacion";
        $option=array('trace'=>1);
        try {
            $soapClient = new SoapClient("http://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl", $option);
            //echo " _ hize la conexion con la api  ";
            $resultRequest = $soapClient->__doRequest($xml, $wsdlloc, $accion, 0);
            //echo " si me dio un resultado  ";
            $soapClient->__last_request = $xml;
            //var_dump($resultRequest);
            //echo "  -REQUEST:\n" . htmlentities($soapClient->__getLastRequest()) . "\n";
            unset($soapClient);
            return $resultRequest;

        } catch (SoapFault $exception) {
            echo "  -REQUEST:\n" . htmlentities($soapClient->__getLastRequest()) . "\n";
            echo $exception->getMessage();
            unset($soapClient);
            return FALSE;
        }
    }
    public function cleanString($str){
        $str = str_replace("Ñ" ,"N", $str);
        $str = str_replace("ñ" ,"n", $str);
        return $str;
    }
    public function insertRadCloud($user, $name, $lastname,$fechaout, $site_code)
    {
    		$atr1="Auth-Type";
    		$atr2="Cleartext-Password";
    		$atr3="Expiration";
    		$op =":=";
    		$Tipo="Local";
    		$passglobal = "123";
    		$createby = "administrator";
    		// $codigo_sitio = "ZCJG";
    		$group = "default";
    		$fechain = date("Y-m-d H:i:s");
    		$fechamod = date ("d M Y H:i:s", strtotime($fechaout)); //Fecha out(expiration)

      		DB::connection('cloudrad')->table('userinfo')->insert([
      			'username' => $user,
      			'firstname' => $name,
      			'lastname' => $lastname,
      			'email' => $site_code,
      			'creationdate' => $fechain,
      			'creationby' => $createby,
      			'expiration' => $fechaout]);
      		DB::connection('cloudrad')->table('radcheck')->insert([
      			['username' => $user, 'attribute' => $atr2, 'op' => $op, 'value' => $passglobal],
      			['username' => $user, 'attribute' => $atr3, 'op' => $op, 'value' => $fechamod]]);
      		DB::connection('cloudrad')->table('radusergroup')->insert(
      			['username' => $user, 'groupname' => $group]);
      }
      public function insertRadSunrise($user, $name, $lastname,$fechaout, $site_code)
      {
  		$atr1="Auth-Type";
  		$atr2="Cleartext-Password";
  		$atr3="Expiration";
  		$op ="+=";
  		$Tipo="Local";
  		$passglobal = "123";
  		$createby = "administrator";
  		// $codigo_sitio = "ZCJG";
  		$group = "default";
  		$fechain = date("Y-m-d H:i:s");
  		$fechamod = date ("d M Y H:i:s", strtotime($fechaout)); //Fecha out(expiration)
          $fullname = $name.' '.$lastname;
  		DB::connection('sunrisezq')->table('authtoken')->insert([
  			'username' => $user,
  			'name' => $fullname,
  			'password' => $passglobal,
  			'createdate' => $fechain,
  			'createby' => $createby,
  			'description' => $site_code,
  			'expiration' => $fechaout,]);
  		DB::connection('sunrisezq')->table('radcheck')->insert(
  			['UserName' => $user, 'Attribute' => $atr1, 'op' => $op, 'Value' => $Tipo],
  			['UserName' => $user, 'Attribute' => $atr2, 'op' => $op, 'Value' => $passglobal],
  			['UserName' => $user, 'Attribute' => $atr3, 'op' => $op, 'Value' => $fechamod]);
  		DB::connection('sunrisezq')->table('usergroup')->insert(
  			['username' => $user, 'groupname' => $group]);
    }
    public function login_palace_test(Request $request)
    {
    	//Agent
    	$agent = new Agent(); // datos del usuario.
        $bool = $agent->isDesktop();
        if($bool){
          $mobile = 0;
        }else{
          $mobile = 1;
        }
        $device = $agent->device();
        $robot = $agent->isRobot();
        if ($robot) {
          $robot_name = $agent->robot();
        }else{
          $robot_name = '';
        }
        // $robot = $agent->robot();
        $languages = $agent->languages();
        if (count($languages) > 0) {
        	$lang = $languages[0];
        }else{
        	$lang = '';
        }
        $browser = $agent->browser();
        $browser_version = $agent->version($browser);
        $platform = $agent->platform();
        if ($agent->version($platform)) {
          $platform_version = $agent->version($platform);
        }else{
          $platform_version = '';
        }
        //Fin Agent
        // Parámetros de logeo
    	$url = $request->url;
    	$proxy = $request->proxy;
    	$sip = $request->sip;
    	$mac = $request->mac;
    	$client_mac = $request->client_mac;
    	$uip = $request->uip;
    	$ssid = $request->ssid;
    	$vlan = $request->vlan;
    	$res = $request->res;
    	$auth = $request->auth;
    	$site = $request->site_code;
    	$username = $request->username;
    	$username1 = $request->username1; // Room number.
    	$password = $request->password1; // Apellido.
    	//Fin parámetros.
    	$lastname_clean = $this->cleanString($password);
    	$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

        $lastname = $this->cleanString($password);
        $lastname = str_replace(' ', '', $lastname);
        $lastname = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");
        $usuariojunto = $lastname . $username1;
        $usuariojunto = $this->cleanString($usuariojunto);
        $fechain = date("Y-m-d H:i:s");
    	// database connection "sunrisezq".
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;
  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();

  		if ($db_user > 0) {
  			// Existe.
  			//insercion de Agent.
  			DB::table('data_agents')->insert([
  				'mac_address' => $client_mac,
  				'browser' => $browser,
  				'browser_version' => $browser_version,
  				'platform' => $platform,
  				'platform_version' => $platform_version,
  				'wificode' => $usuariojunto,
  				'device' => $device,
  				'language' => $lang,
  				'robot' => $robot_name,
  				'site_id' => $site_info[0]->id,
  				'mobile' => $mobile,
  				'success' => 1
  			]);
  			return view('visitor.submitx_test', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
  		}else{
  			// No existe.
  	    	$XMLresponse = $this->getInfoxHab($username1, $site);
  	        $XMLresponse = str_replace('xmlns=', 'ns=', $XMLresponse);
  	        $XMLsimple = simplexml_load_string($XMLresponse);

  			$xml_for = $XMLsimple->xpath('//RmFolio');

  			if (empty($xml_for)) {
  				// No existe.
  				DB::table('data_agents')->insert([
  					'mac_address' => $client_mac,
  					'browser' => $browser,
  					'browser_version' => $browser_version,
  					'platform' => $platform,
  					'platform_version' => $platform_version,
  					'wificode' => $usuariojunto,
  					'device' => $device,
  					'language' => $lang,
  					'robot' => $robot_name,
  					'site_id' => $site_info[0]->id,
  					'mobile' => $mobile,
  					'success' => 0,
  				]);
  				$response = 'insertar en data_agents con logeo normal';
  				return view('visitor.submitx_test', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
  			}else{
  				// Existe.
  				foreach ($xml_for as $RmFolio) {
  					// empty($RmFolio->Rmfolio->last_name) ? $ApeXML = '' : $ApeXML = $RmFolio->Rmfolio->last_name;
  					$ApeXML = $RmFolio->Rmfolio->last_name;
  					// empty($RmFolio->Rmfolio->first_name) ? $NombreXML = '' : $NombreXML = $RmFolio->Rmfolio->last_name;
  					$NombreXML = $RmFolio->Rmfolio->first_name;
  					// empty($RmFolio->Rmfolio->nights) ? $nochesXML = '' : $nochesXML = $RmFolio->Rmfolio->nights;
  					$nochesXML = $RmFolio->Rmfolio->nights;
  				}
                  $ApeXML = $this->cleanString($ApeXML);
                  $ApeXML = mb_convert_case($ApeXML, MB_CASE_UPPER, "UTF-8");

                  $NombreXML = $this->cleanString($NombreXML);
                  $NombreXML = mb_convert_case($NombreXML, MB_CASE_UPPER, "UTF-8");

                  $nochesXML = $nochesXML +1;
                  $noches = "+" . $nochesXML . " day";
                  $fechaout = strtotime ( $noches , strtotime ( $fechain ) ) ;
                  $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );
                  if($ApeXML === $lastname_clean){
                      // echo " _si existe en el PMS ";
  					DB::table('data_agents')->insert([
  						'mac_address' => $client_mac,
  						'browser' => $browser,
  						'browser_version' => $browser_version,
  						'platform' => $platform,
  						'platform_version' => $platform_version,
  						'wificode' => $usuariojunto,
  						'device' => $device,
  						'language' => $lang,
  						'robot' => $robot_name,
  						'site_id' => $site_info[0]->id,
  						'mobile' => $mobile,
  						'success' => 1,
  						'expiration' => $fechaout
  					]);
  					DB::table('data_sites')->insert([
  						'lastname' => $lastname_clean,
  						'wificode' => $usuariojunto,
  						'site_id' => $site_info[0]->id,
  						'expiration' => $fechaout
  					]);
                      $this->insertRadCloud($usuariojunto, $NombreXML, $lastname_clean, $fechaout, $site);
                      //$this->insertRadSunrise($usuariojunto, $NombreXML, $lastname, $fechaout, $site);
                      usleep(5000);
                      $response = 'debio insertar en sunrise';
                      return view('visitor.submitx_test', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
                  }else{
                      // echo " _no existe en el PMS__?? raro  ";
  					DB::table('data_agents')->insert([
  						'mac_address' => $client_mac,
  						'browser' => $browser,
  						'browser_version' => $browser_version,
  						'platform' => $platform,
  						'platform_version' => $platform_version,
  						'wificode' => $usuariojunto,
  						'device' => $device,
  						'language' => $lang,
  						'robot' => $robot_name,
  						'site_id' => $site_info[0]->id,
  						'mobile' => $mobile,
  						'success' => 0,
  					]);
  					// DB::table('data_sites')->insert([
  					// 	'lastname' => $lastname,
  					// 	'wificode' => $usuariojunto,
  					// 	'site_id' => $site_info[0]->id
  					// ]);
                      $response = 'Nada de nada';
                      return view('visitor.submitx_test', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'response'));
                  }
  			}
  		}
    }

}
