<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
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
        //$site = $request->site_code;
        $name = $request->name;
        $pais = $request->select_pais;
        $email = $request->email;
      //
      //user test radius
      $user = 'comodin';
      $password = 'S1tc@N15';

      //DB::table('FreeWifiTest')->insert(['name' => $name,'country' => $pais,'email' => $email,'mac_address' => $client_mac]);
      return view('visitor.submitx_freewifi', compact('user', 'password','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
      //return $request;
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

          DB::connection('rad_freewifi')->table('userinfo')->insert([
            'username' => $user,
            'firstname' => $name,
            'lastname' => $lastname,
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