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
      //
      //user test radius
      $site_info = DB::connection('freewifi_data')->table('sites')->select('id','nombre')->where('code', $site)->first();
      $site_name = $site_info->nombre;
      $date_carbon = Carbon::now()->format('M-d-h:m:s');
      $uniqid = uniqid();
      $uuid = $date_carbon .'-'.$uniqid;
      $fecha = Carbon::now();
      $fechaout = $fecha->addMinutes(30);

      $user = 'comodin';
      $password = 'S1tc@N15';
      //Carbon::parse();
      $this->insertRadCloudFreeWifi($uuid, $name, $fechaout, $site_code);

      DB::connection('freewifi_data')->table('data_agents')->insert([
        'mac_address' => $client_mac,
        'browser' => $browser,
        'browser_version' => $browser_version,
        'platform' => $platform,
        'platform_version' => $platform_version,
        'wificode' => $uuid,
        'device' => $device,
        'language' => $lang,
        'robot' => $robot_name,
        'site_id' => $site_info->id,
        'mobile' => $mobile,
        'name' => $name,
        'country_code' => $pais,
        'email' => $email,
        'expiration' => $fechaout,
        'success' => 1
      ]);
      DB::connection('freewifi_data')->table('data_sites')->insert([
        'lastname' => $name,
        'email' => $email,
        'wificode' => $uuid,
        'site_id' => $site_info->id,
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
        // $codigo_sitio = "ZCJG";
        $group = "default";
        $fechain = date("Y-m-d H:i:s");
        $fechamod = $fechaout->format('d M Y H:i:s');

          DB::connection('rad_freewifi')->table('userinfo')->insert([
            'username' => $user,
            'firstname' => $name,
            'email' => $site_code,
            'creationdate' => $fechain,
            'creationby' => $createby,
            'expiration' => $fechaout]);
          DB::connection('rad_freewifi')->table('radcheck')->insert([
            ['username' => $user, 'attribute' => $atr2, 'op' => $op, 'value' => $passglobal],
            ['username' => $user, 'attribute' => $atr3, 'op' => $op, 'value' => $fechamod]]);
          DB::connection('rad_freewifi')->table('radusergroup')->insert(
            ['username' => $user, 'groupname' => $group]);
    }
}
