<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlueController extends Controller
{
    public function login_bluebay(Request $request)
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

    	$wificode = $request->wificode; // Wificode.
    	$firstname = $request->apellido; // Nombre.
    	$lastname = $request->nombre; // Apellido.
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	// $site_name = $site_info[0]->nombre;
  		$db_user = DB::connection('sunrisezq')->table('authtoken')->select('username')->where('username', $usuariojunto)->count();
    	$fechain = date("Y-m-d H:i:s");
      	$temporal = $wificode;

      	if ($db_user > 0) {
      		// Existe codigo.
      		return view('visitor.submitx', compact('site_name','temporal','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
      	}else{
      		
      	}

    }
    public function checkProfile($user, $fecha){

        $stmt = "SELECT profile FROM authtoken WHERE username = ?";

        $query = $this->dbConxZQ->prepareQ($stmt);
        $query->bindParam(1, $user);
        $query->execute();
        $row = $query->fetch();

        $profile = $row['profile'];

        switch ($profile) {
            case 'bbay-1dia':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-3dias':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-7dias':
                $this->loginZD('MALCODIGO');
                break;
            case 'circleone':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-free':
                $fechaout = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
                $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );
                $this->updateAuth($user, $fechaout);
                $this->insertRadChk($user, $fechaout);
                break;

        }
    }
    public function cleanString($str){
        $str = str_replace("Ñ" ,"N", $str);
        $str = str_replace("ñ" ,"n", $str);
        return $str;
    }
}
