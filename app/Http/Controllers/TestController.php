<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;
use SoapClient;
use Session;
use DB;

class TestController extends Controller
{
private $xmlreq=<<<XML
<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><Post_ObtenerInfoRoomPorHabitacion xmlns="http://localhost/xmlschemas/postserviceinterface/16-07-2009/"><RmroomRequest xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/RmroomRequest.xsd"><Rmroom><hotel xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></hotel><room xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></room></Rmroom><rooms /></RmroomRequest></Post_ObtenerInfoRoomPorHabitacion></soap:Body></soap:Envelope>
XML;
	public function testfunc()
	{
        $ip = '172.20.0.2';
        $zd = 'http://' . $ip . ':9997/login';
        $sz = 'https://'. $ip.':9998/SubscriberPortal/hotspotlogin';

        $agent = new Agent();
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
          $robot_name = 'vacio';
        }

        //$mobile = $agent->isPhone();
        // iPhone
        // iOS
        $languages = $agent->languages();

        $browser = $agent->browser();
        $version1 = $agent->version($browser);

        $platform = $agent->platform();

        //$version2 = $agent->version($platform);
        if ($agent->version($platform)) {
          $version2 = $agent->version($platform);
        }else{
          $version2 = '';
        }

    		dd($languages[0]);
	}
	public function test()
	{
		$usuariojunto = 'MAGA DANIELS207';
		$username1 = '30816'; //30734 30931 - KING30931  SHAWNYA NICOLE
		$site_code = 'ZCJG';
		$XMLresponse = $this->getInfoxHab($username1, $site_code);
		$XMLresponse = str_replace('xmlns=', 'ns=', $XMLresponse);
		$XMLsimple = simplexml_load_string($XMLresponse);

		$algo = $XMLsimple->xpath('//RmFolio');
		if (empty($algo)) {
			$algo2 = 'vacio';
			dd($algo2);
		}else{
			dd($algo);
		}
	}
  public function test_xml($room, $site_code)
  {
    $usuariojunto = 'MAGA DANIELS207';
    $username1 = '30816'; //30734 30931 - KING30931  SHAWNYA NICOLE

    $XMLresponse = $this->getInfoxHab($room, $site_code);
    $XMLresponse = str_replace('xmlns=', 'ns=', $XMLresponse);
    $XMLsimple = simplexml_load_string($XMLresponse);

    $algo = $XMLsimple->xpath('//RmFolio');
    if (empty($algo)) {
      $algo2 = 'vacio';
      dd($algo2);
    }else{
      dd($algo);
    }
  }
  public function testing()
  {
    $usuariojunto = 'MAGA DANIELS207';
    $usuario= 'MAGA DANIELS';
    $password = '307';

    $usuario_replace = str_replace(' ', '', $usuariojunto);

    $usuario_trim = trim($usuariojunto);
    $db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    $db_user_info = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->get();
    if (empty($db_user_info)) {
      $user_db = '';
    }else{
      $user_db = $db_user_info[0]->username;
    }
    if ($db_user > 0) {
      $var = ' > 0 si';
    }else{
      $var = ' ñooo';
    }
    if ($usuariojunto === $user_db) {
      dd($usuario_replace,$db_user, $db_user_info, $var, 'Cierto');
    }else{
      dd($usuario_replace,$db_user, $db_user_info, $var, 'Nahhhh');
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

  public function creandosession(Request $request)
  {

    session(['sip' => $request->sip]);
    session(['mac' => $request->mac]);
    session(['client_mac' => $request->client_mac]);
    session(['uip' => $request->uip]);
    session(['ssid' => $request->ssid]);
    session(['vlan' => $request->vlan]);
    session(['res' => $request->res]);
    session(['auth' => $request->auth]);
    return 'OK';
  }

}
