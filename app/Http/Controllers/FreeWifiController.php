<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use DB;

class FreeWifiController extends Controller
{

    public function login_freewifi(Request $request)
    {
      // Agent
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
  		// Fin Agent
      // Parametros de logeo
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

        $name = $request->name;
        $pais = $request->select_pais;
        $email = $request->email;
        $edad = $request->edad;
        $genero = $request->genero;
      //
      //user test radius
      // procedure para obtener site_id
      //$mac = '84:18:3a:1e:4c:70';
      $site_info = DB::connection('cloudalice')->select('CALL get_venue_id_with_MAC(?)', array($mac));
      //$site_info[0]->ID_VENUE == 0; Hacer validacion de 0
      //$site_info = DB::connection('freewifi_data')->table('sites')->select('id','nombre')->where('code', $site)->first();
      //$site_name = $site_info[0]->NAME_VENUE;
      //$chain_name = $site_info[0]->NAME_CHAIN;
      $date_carbon = Carbon::now()->format('M-d-h-i-s');
      //return $date_carbon;
      $uniqid = uniqid();
      $uuid = $date_carbon .'-'.$uniqid;
      $fecha = Carbon::now();
      $fechaout = $fecha->addDays(1);

      //$user = 'comodin';
      //$password = 'S1tc@N15';
      $user = $uuid;
      $password = '123';
      //Carbon::parse();

      // antes de insertar revisar la mac de la antena para sacar el id de sitio a que corresponde.
      // get_venue_id_with_MAC('MAC')
      // grafica de download get_mb_download_chain_venue(?,?,?,?) (cadena,venue, fechaini, fechafin) //FreeWifi DB
      // grafica de upload  get_mb_upload_chain_venue(?,?,?,?) (cadena,venue, fechaini, fechafin) // FreeWifiDB

      $this->insertRadCloudFreeWifi($uuid, $name, $fechaout, $site_info[0]->ID_VENUE);

      DB::connection('freewifi_data')->table('data_agents')->insert([
        'mac_address' => $client_mac,
        'station_mac' => $mac,
        'browser' => $browser,
        'browser_version' => $browser_version,
        'platform' => $platform,
        'platform_version' => $platform_version,
        'wificode' => $uuid,
        'device' => $device,
        'language' => $lang,
        'robot' => $robot_name,
        'site_id' => $site_info[0]->ID_VENUE,
        'cadena_id' => $site_info[0]->ID_CHAIN,
        'mobile' => $mobile,
        'name' => $name,
        'country_code' => $pais,
        'email' => $email,
        'age' => $edad,
        'gender' => $genero,
        'expiration' => $fechaout,
        'success' => 1
      ]);
      DB::connection('freewifi_data')->table('data_sites')->insert([
        'lastname' => $name,
        'email' => $email,
        'wificode' => $uuid,
        'site_id' => $site_info[0]->ID_VENUE,
        'expiration' => $fechaout
      ]);

      //DB::table('FreeWifiTest')->insert(['name' => $name,'country' => $pais,'email' => $email,'mac_address' => $client_mac]);

      return view('visitor.submitx_freewifi', compact('user', 'password','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'site_name'));
      //return $request;
    }
    public function insertRadCloudFreeWifi($user, $name,$fechaout, $site_code)
    {
        $atr1="Auth-Type";
        $atr2="Cleartext-Password";
        $atr3="Expiration";
        $op =":=";
        $Tipo="Local";
        $passglobal = "123";
        $createby = "administrator";
        $group = "default";
        $fechain = date("Y-m-d H:i:s");
        $fechamod = $fechaout->format('d M Y H:i:s');

          DB::connection('rad_freewifi')->table('userinfo')->insert([
            'username' => $user,
            'firstname' => $name,
            'email' => $site_code,
            'creationdate' => $fechain,
            'creationby' => $createby]);
          DB::connection('rad_freewifi')->table('radcheck')->insert([
            ['username' => $user, 'attribute' => $atr2, 'op' => $op, 'value' => $passglobal],
            ['username' => $user, 'attribute' => $atr3, 'op' => $op, 'value' => $fechamod]]);
          DB::connection('rad_freewifi')->table('radusergroup')->insert(
            ['username' => $user, 'groupname' => $group]);
    }
}
