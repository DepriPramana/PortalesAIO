<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Agent\Agent;

class HaciendaController extends Controller
{
    public function index()
    {
    	# code...
    }

    public function query_example()
    {
    	// $sql = DB::connection('hacienda_sqlsrv')->table('imm_reister')->select()->where('lastname', 'BREWER')->where('room', 405)->orderBy('id', 'desc')->get()->first();

		$sql = DB::connection('hacienda_sqlsrv_practice')->table('imm_register')->select()->where('room', $room_numba)->orderBy('id', 'desc')->get()->first();
    }

	public function login_premium_free(Request $request)
    {
    	//url testing http://localhost:8000/HaciendaEncantada?sip=172.200.1.117&client_mac=xcadgH0012aa&ssid=Hola
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
		//Fin parámetros.
    	$service_cost = 0;
    	$email = $request->email_address;
    	$fullname = $request->fullname;
    	$client_mac_new = $this->AddSeparator($client_mac);
    	// $mac_testing = mb_convert_case($client_mac, MB_CASE_UPPER, "UTF-8");

    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;
    	$usuariojunto = 'HACIENDAFREE';
        
		DB::table('data_agents_hacienda')->insert([
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
			'email' => $email,
			'full_name' => $fullname,
			'success' => 1
		]);

        return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));

    	return $site_name;
    }

    public function login_premium_1(Request $request)
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
		//Fin parámetros.
		$lastname = $request->lastname;
		$lastname_clean = $this->cleanString($lastname);
		$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

		$room_numba = $request->room;
		$usuariojunto = $lastname_clean . $room_numba;
    	$service_cost = 12;
    	$time = '24h';
    	$client_mac_new = $this->AddSeparator($client_mac);
		$fechain = date("Y-m-d H:i:s");
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;

  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	//LEYVA3263
  		if ($db_user > 0) {
  			// Existe.
  			//insercion de Agent.
			// DB::table('data_agents_hacienda')->insert([
			// 	'mac_address' => $client_mac,
			// 	'browser' => $browser,
			// 	'browser_version' => $browser_version,
			// 	'platform' => $platform,
			// 	'platform_version' => $platform_version,
			// 	'wificode' => $usuariojunto,
			// 	'device' => $device,
			// 	'language' => $lang,
			// 	'robot' => $robot_name,
			// 	'site_id' => $site_info[0]->id,
			// 	'mobile' => $mobile,
			// 	'success' => 1

			// ]);

    		// return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
    		return 'primera validacion';
  		}else{
  			// No existe usuario.
  			// checar pms
			$sql = DB::connection('hacienda_sqlsrv_practice')->table('imm_register')->select()->where('room', $room_numba)->orderBy('id', 'desc')->get()->first();
			//5272 && CASTILLO / campbell
			// query correcto.
			$sql_good = DB::connection('hacienda_sqlsrv')->table('imm_register')->select()->where([
				['room', $room_numba],
				['lastname', $lastname]
			])->whereNull('checkout')->orderBy('checkin', 'desc')->orderBy('id', 'desc')->get()->first();
			
			if ($lastname_clean == $sql_good->lastname) {
				# code...
			}



  		}

    	return (string)$db_user;
    }

    public function login_premium_2(Request $request)
    {
    	$service_cost = 60;
    	return 'Ok_2';
    }

    public function login_premium_3(Request $request)
    {
    	$service_cost = 10;
    	return 'Ok_3';
    }

    public function login_premium_4(Request $request)
    {
    	$service_cost = 48;
    	return 'Ok_4';
    }

    public function cleanString($str){
        $str = str_replace("Ñ" ,"N", $str);
        $str = str_replace("ñ" ,"n", $str);
        return $str;
    }
	public static function IsValid($mac)
	{
		return (preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $mac) == 1);
	}
	public static function RemoveSeparator($mac, $separator = array(':', '-'))
	{
		return str_replace($separator, '', $mac);
	}
	public static function AddSeparator($mac, $separator = ':')
	{
		$mac = mb_convert_case($mac, MB_CASE_UPPER, "UTF-8");
		return join($separator, str_split($mac, 2));
	}
}
