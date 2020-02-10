<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;

class UnitecController extends Controller
{
    public function login_unitec(Request $request)
    {
    	//Agent
    	  /*$agent = new Agent(); // datos del usuario.
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
        }*/
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
        $site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
        $site_name = $site_info[0]->nombre;
        $username = $request->username;
        $password = $request->password;

        return view('visitor.submitx_unitec', compact('site_name','username', 'password','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));

    }
    public function login_uvm(Request $request)
    {
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
      // $username = $request->username;
      // $password = $request->password; // Apellido.
      $username = "840111496"; // antiguo 020168604
      $password = "300301"; // antiguo 202015
      $site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
      $site_name = $site_info[0]->nombre;

      return view('visitor.submitx_uvm', compact('site_name','username', 'password','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));

    }
}
