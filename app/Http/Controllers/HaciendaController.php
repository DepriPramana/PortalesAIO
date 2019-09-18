<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;

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

    public function try_login_hacienda(Request $request)
    {
    	return 'try log in';
		//Parámetros de logeo
			$usuariojunto = $request->username;
			$url = $request->url;
			$proxy = $request->proxy;
			$sip = $request->sip;
			$mac = $request->mac;
			$client_mac = $request->client_mac;
			$uip = $request->uip;
			$ssid = $request->ssid;
			$vlan = $request->vlan;
		//Fin parámetros.
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;
        return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
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
		$lastname_upper = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");

		$lastname_clean = $this->cleanString($lastname);
		$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

		$room_numba = (string)$request->room;
		$usuariojunto = $lastname_clean . $room_numba . $site;

		$service_id = 1; // Premium Diario No Miembros|Premium Daily Non Member
		$service_name = 'Premium Diario No Miembros|Premium Daily Non Member'; // Nombre del servicio.
		$service_price = '12'; // Precio del servicio.
		$service_drate = '2000';
		$service_urate = '2000';
		$service_expiration = '1 day'; // Tiempo del servicio.
		$expiration_db = 1;
		$service_devices = 4; // id del tipo de dispositivo(siempre se usa el id 4)

    	$client_mac_new = $this->AddSeparator($client_mac);
		$fechain = date("Y-m-d H:i:s");
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;

  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	//LEYVA3263

  		// return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
  		// return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
  		// return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
  		// return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);

    	if ($request->room_or_acc == 'existing') {
			// intentar logearlo.
			if ($db_user > 0) {
	  			// Existe.
	  			//insercion de Agent.
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
					'success' => 1
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}else{
				//insercion de Agent.
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
					'success' => 0
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}
    	}
  		else{
  			// No existe usuario.
  			// checar pms
			//5272 && CASTILLO / campbell
			// query correcto.
			$sql_good = DB::connection('hacienda_sqlsrv')->table('imm_register')->select()->where([
				['room', $room_numba],
				['lastname', $lastname]
			])->whereNull('checkout')->orderBy('checkin', 'desc')->orderBy('id', 'desc')->get()->first();


			if (empty($sql_good)) {
				return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
			}else{
				if ($sql_good->owner == 'N') {
					$check_pay_reservation = DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->where('reservation_id', $sql_good->reservation_id)->orderBy('activation_datetime', 'desc')->get()->first();
					if (empty($check_pay_reservation)) {
						// puede continuar con el cobro no es miembro y no tiene ningun registro de cargo.
						// insert
						$fechain = Carbon::now();
						$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
	  						'success' => 1,
	  						'expiration' => $fechaout
	  					]);
	  					DB::table('data_sites_hacienda')->insert([
	  						'lastname' => $lastname_upper,
	  						'wificode' => $usuariojunto,
	  						'site_id' => $site_info[0]->id,
	  						'reservation_id' => $sql_good->reservation_id,
	  						'owner' => $sql_good->owner,
	  						'site_hacienda_id' => $request->id_site_code,
	  						'expiration' => $fechaout
	  					]);
						DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
							'register_id' => $sql_good->id,
							'reservation_id' => $sql_good->reservation_id,
							'siteid' => $request->id_site_code,
							'service_id' => $service_id,
							'service_price' => $service_price,
							'service_drate' => $service_drate,
							'service_urate' => $service_urate,
							'service_expiration' => $service_expiration,
							'service_devices' => $service_devices,
							'service_name' => $service_name,
							'activation_datetime' => Carbon::now(),
							'account' => $usuariojunto,
							'mac' => $client_mac_new,
							'device' => $platform,
							'status' => 'active',
							'transactiondate' => Carbon::now(),
						]);
						// insert en radius.
						$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
						usleep(5000);
						return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
					}else{
						// ya tiene un cargo, checar si ya vencio.
						$datenow = Carbon::now();
						$date_register = Carbon::parse($check_pay_reservation->activation_datetime)->addDays($check_pay_reservation->service_expiration[0]);
						if ($datenow->greaterThan($date_register)) {
							// ya expiro, crear otro cargo.
							// puede continuar con el cobro no es miembro.
							// insert
							$fechain = Carbon::now();
							$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
		  						'success' => 1,
		  						'expiration' => $fechaout
		  					]);
		  					DB::table('data_sites_hacienda')->insert([
		  						'lastname' => $lastname_upper,
		  						'wificode' => $usuariojunto,
		  						'site_id' => $site_info[0]->id,
		  						'reservation_id' => $sql_good->reservation_id,
		  						'owner' => $sql_good->owner,
		  						'site_hacienda_id' => $request->id_site_code,
		  						'expiration' => $fechaout
		  					]);
							DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
								'register_id' => $sql_good->id,
								'reservation_id' => $sql_good->reservation_id,
								'siteid' => $request->id_site_code,
								'service_id' => $service_id,
								'service_price' => $service_price,
								'service_drate' => $service_drate,
								'service_urate' => $service_urate,
								'service_expiration' => $service_expiration,
								'service_devices' => $service_devices,
								'service_name' => $service_name,
								'activation_datetime' => Carbon::now(),
								'account' => $usuariojunto,
								'mac' => $client_mac_new,
								'device' => $platform,
								'status' => 'active',
								'transactiondate' => Carbon::now(),
							]);
							// insert en radius.
							$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
							usleep(5000);

							return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
						}else{
							// todavia no expira, retornar mensaje.
							return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);
						}
					}
				}else{
					return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
				}
			}
		}
    	return '0';
    }

    public function login_premium_2(Request $request)
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
		$lastname_upper = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");

		$lastname_clean = $this->cleanString($lastname);
		$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

		$room_numba = (string)$request->room;
		$usuariojunto = $lastname_clean . $room_numba . $site;

		$service_id = 2; // Premium Diario No Miembros|Premium Daily Non Member
		$service_name = 'Premium Semanal No Miembros|Premium Weekly Non Member'; // Nombre del servicio.
		$service_price = '60'; // Precio del servicio.
		$service_drate = '2000';
		$service_urate = '2000';
		$service_expiration = '7 day'; // Tiempo del servicio.
		$expiration_db = 7;
		$service_devices = 4; // id del tipo de dispositivo(siempre se usa el id 4)

    	$client_mac_new = $this->AddSeparator($client_mac);
		$fechain = date("Y-m-d H:i:s");
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;

  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	//LEYVA3263

  		// return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
  		// return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
  		// return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
  		// return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);

    	if ($request->room_or_acc == 'existing') {
			// intentar logearlo.
			if ($db_user > 0) {
	  			// Existe.
	  			//insercion de Agent.
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
					'success' => 1
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}else{
				//insercion de Agent.
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
					'success' => 0
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}
    	}
  		else{
  			// No existe usuario.
  			// checar pms
			//5272 && CASTILLO / campbell
			// query correcto.
			$sql_good = DB::connection('hacienda_sqlsrv')->table('imm_register')->select()->where([
				['room', $room_numba],
				['lastname', $lastname]
			])->whereNull('checkout')->orderBy('checkin', 'desc')->orderBy('id', 'desc')->get()->first();


			if (empty($sql_good)) {
				return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
			}else{
				if ($sql_good->owner == 'N') {
					$check_pay_reservation = DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->where('reservation_id', $sql_good->reservation_id)->orderBy('activation_datetime', 'desc')->get()->first();
					if (empty($check_pay_reservation)) {
						// puede continuar con el cobro no es miembro y no tiene ningun registro de cargo.
						// insert
						$fechain = Carbon::now();
						$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
	  						'success' => 1,
	  						'expiration' => $fechaout
	  					]);
	  					DB::table('data_sites_hacienda')->insert([
	  						'lastname' => $lastname_upper,
	  						'wificode' => $usuariojunto,
	  						'site_id' => $site_info[0]->id,
	  						'reservation_id' => $sql_good->reservation_id,
	  						'owner' => $sql_good->owner,
	  						'site_hacienda_id' => $request->id_site_code,
	  						'expiration' => $fechaout
	  					]);
						DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
							'register_id' => $sql_good->id,
							'reservation_id' => $sql_good->reservation_id,
							'siteid' => $request->id_site_code,
							'service_id' => $service_id,
							'service_price' => $service_price,
							'service_drate' => $service_drate,
							'service_urate' => $service_urate,
							'service_expiration' => $service_expiration,
							'service_devices' => $service_devices,
							'service_name' => $service_name,
							'activation_datetime' => Carbon::now(),
							'account' => $usuariojunto,
							'mac' => $client_mac_new,
							'device' => $platform,
							'status' => 'active',
							'transactiondate' => Carbon::now(),
						]);
						// insert en radius.
						$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
						usleep(5000);
						return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
					}else{
						// ya tiene un cargo, checar si ya vencio.
						$datenow = Carbon::now();
						$date_register = Carbon::parse($check_pay_reservation->activation_datetime)->addDays($check_pay_reservation->service_expiration[0]);
						if ($datenow->greaterThan($date_register)) {
							// ya expiro, crear otro cargo.
							// puede continuar con el cobro no es miembro.
							// insert
							$fechain = Carbon::now();
							$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
		  						'success' => 1,
		  						'expiration' => $fechaout
		  					]);
		  					DB::table('data_sites_hacienda')->insert([
		  						'lastname' => $lastname_upper,
		  						'wificode' => $usuariojunto,
		  						'site_id' => $site_info[0]->id,
		  						'reservation_id' => $sql_good->reservation_id,
		  						'owner' => $sql_good->owner,
		  						'site_hacienda_id' => $request->id_site_code,
		  						'expiration' => $fechaout
		  					]);
							DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
								'register_id' => $sql_good->id,
								'reservation_id' => $sql_good->reservation_id,
								'siteid' => $request->id_site_code,
								'service_id' => $service_id,
								'service_price' => $service_price,
								'service_drate' => $service_drate,
								'service_urate' => $service_urate,
								'service_expiration' => $service_expiration,
								'service_devices' => $service_devices,
								'service_name' => $service_name,
								'activation_datetime' => Carbon::now(),
								'account' => $usuariojunto,
								'mac' => $client_mac_new,
								'device' => $platform,
								'status' => 'active',
								'transactiondate' => Carbon::now(),
							]);
							// insert en radius.
							$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
							usleep(5000);

							return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
						}else{
							// todavia no expira, retornar mensaje.
							return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);
						}
					}
				}else{
					return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
				}
			}
		}
    	return '0';
    }

    public function login_premium_3(Request $request)
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
		$lastname_upper = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");

		$lastname_clean = $this->cleanString($lastname);
		$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

		$room_numba = (string)$request->room;
		$usuariojunto = $lastname_clean . $room_numba . $site;

		$service_id = 3; // Premium Diario No Miembros|Premium Daily Non Member
		$service_name = 'Premium Diario Miembros|Premium Daily Member'; // Nombre del servicio.
		$service_price = '10'; // Precio del servicio.
		$service_drate = '5000';
		$service_urate = '3000';
		$service_expiration = '1 day'; // Tiempo del servicio.
		$expiration_db = 1;
		$service_devices = 4; // id del tipo de dispositivo(siempre se usa el id 4)

    	$client_mac_new = $this->AddSeparator($client_mac);
		$fechain = date("Y-m-d H:i:s");
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;

  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	//LEYVA3263

  		// return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
  		// return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
  		// return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
  		// return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);

    	if ($request->room_or_acc == 'existing') {
			// intentar logearlo.
			if ($db_user > 0) {
	  			// Existe.
	  			//insercion de Agent.
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
					'success' => 1
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}else{
				//insercion de Agent.
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
					'success' => 0
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}
    	}
  		else{
  			// No existe usuario.
  			// checar pms
			//5272 && CASTILLO / campbell
			// query correcto.
			$sql_good = DB::connection('hacienda_sqlsrv')->table('imm_register')->select()->where([
				['room', $room_numba],
				['lastname', $lastname]
			])->whereNull('checkout')->orderBy('checkin', 'desc')->orderBy('id', 'desc')->get()->first();


			if (empty($sql_good)) {
				return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
			}else{
				if ($sql_good->owner == 'Y') {
					$check_pay_reservation = DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->where('reservation_id', $sql_good->reservation_id)->orderBy('activation_datetime', 'desc')->get()->first();
					if (empty($check_pay_reservation)) {
						// puede continuar con el cobro no es miembro y no tiene ningun registro de cargo.
						// insert
						$fechain = Carbon::now();
						$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
	  						'success' => 1,
	  						'expiration' => $fechaout
	  					]);
	  					DB::table('data_sites_hacienda')->insert([
	  						'lastname' => $lastname_upper,
	  						'wificode' => $usuariojunto,
	  						'site_id' => $site_info[0]->id,
	  						'reservation_id' => $sql_good->reservation_id,
	  						'owner' => $sql_good->owner,
	  						'site_hacienda_id' => $request->id_site_code,
	  						'expiration' => $fechaout
	  					]);
						DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
							'register_id' => $sql_good->id,
							'reservation_id' => $sql_good->reservation_id,
							'siteid' => $request->id_site_code,
							'service_id' => $service_id,
							'service_price' => $service_price,
							'service_drate' => $service_drate,
							'service_urate' => $service_urate,
							'service_expiration' => $service_expiration,
							'service_devices' => $service_devices,
							'service_name' => $service_name,
							'activation_datetime' => Carbon::now(),
							'account' => $usuariojunto,
							'mac' => $client_mac_new,
							'device' => $platform,
							'status' => 'active',
							'transactiondate' => Carbon::now(),
						]);
						// insert en radius.
						$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
						usleep(5000);
						return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
					}else{
						// ya tiene un cargo, checar si ya vencio.
						$datenow = Carbon::now();
						$date_register = Carbon::parse($check_pay_reservation->activation_datetime)->addDays($check_pay_reservation->service_expiration[0]);
						if ($datenow->greaterThan($date_register)) {
							// ya expiro, crear otro cargo.
							// puede continuar con el cobro no es miembro.
							// insert
							$fechain = Carbon::now();
							$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
		  						'success' => 1,
		  						'expiration' => $fechaout
		  					]);
		  					DB::table('data_sites_hacienda')->insert([
		  						'lastname' => $lastname_upper,
		  						'wificode' => $usuariojunto,
		  						'site_id' => $site_info[0]->id,
		  						'reservation_id' => $sql_good->reservation_id,
		  						'owner' => $sql_good->owner,
		  						'site_hacienda_id' => $request->id_site_code,
		  						'expiration' => $fechaout
		  					]);
							DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
								'register_id' => $sql_good->id,
								'reservation_id' => $sql_good->reservation_id,
								'siteid' => $request->id_site_code,
								'service_id' => $service_id,
								'service_price' => $service_price,
								'service_drate' => $service_drate,
								'service_urate' => $service_urate,
								'service_expiration' => $service_expiration,
								'service_devices' => $service_devices,
								'service_name' => $service_name,
								'activation_datetime' => Carbon::now(),
								'account' => $usuariojunto,
								'mac' => $client_mac_new,
								'device' => $platform,
								'status' => 'active',
								'transactiondate' => Carbon::now(),
							]);
							// insert en radius.
							$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
							usleep(5000);

							return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
						}else{
							// todavia no expira, retornar mensaje.
							return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);
						}
					}
				}else{
					return response()->json(['status' => 3, 'msg' => 'You are not a member, use a non member option to have internet access.']);
				}
			}
		}
    	return '0';
    }

    public function login_premium_4(Request $request)
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
		$lastname_upper = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");

		$lastname_clean = $this->cleanString($lastname);
		$lastname_clean = mb_convert_case($lastname_clean, MB_CASE_UPPER, "UTF-8");

		$room_numba = (string)$request->room;
		$usuariojunto = $lastname_clean . $room_numba . $site;

		$service_id = 4; // Premium Diario No Miembros|Premium Daily Non Member
		$service_name = 'Premium Semanal Miembros|Premium Weekly Member'; // Nombre del servicio.
		$service_price = '48'; // Precio del servicio.
		$service_drate = '5000';
		$service_urate = '3000';
		$service_expiration = '7 day'; // Tiempo del servicio.
		$expiration_db = 7;
		$service_devices = 4; // id del tipo de dispositivo(siempre se usa el id 4)

    	$client_mac_new = $this->AddSeparator($client_mac);
		$fechain = date("Y-m-d H:i:s");
    	$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    	$site_name = $site_info[0]->nombre;

  		$db_user = DB::connection('cloudrad')->table('userinfo')->select('username')->where('username', $usuariojunto)->count();
    	//LEYVA3263

  		// return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
  		// return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
  		// return response()->json(['status' => 3, 'msg' => 'You are a member, use a member option to have internet access.']);
  		// return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);

    	if ($request->room_or_acc == 'existing') {
			// intentar logearlo.
			if ($db_user > 0) {
	  			// Existe.
	  			//insercion de Agent.
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
					'success' => 1
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}else{
				//insercion de Agent.
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
					'success' => 0
				]);
				return view('visitor.submitx_hacienda', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
	  		}
    	}
  		else{
  			// No existe usuario.
  			// checar pms
			//5272 && CASTILLO / campbell
			// query correcto.
			$sql_good = DB::connection('hacienda_sqlsrv')->table('imm_register')->select()->where([
				['room', $room_numba],
				['lastname', $lastname]
			])->whereNull('checkout')->orderBy('checkin', 'desc')->orderBy('id', 'desc')->get()->first();


			if (empty($sql_good)) {
				return response()->json(['status' => 2, 'msg' => 'No match with that lastname or room number']);
			}else{
				if ($sql_good->owner == 'Y') {
					$check_pay_reservation = DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->where('reservation_id', $sql_good->reservation_id)->orderBy('activation_datetime', 'desc')->get()->first();
					if (empty($check_pay_reservation)) {
						// puede continuar con el cobro no es miembro y no tiene ningun registro de cargo.
						// insert
						$fechain = Carbon::now();
						$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
	  						'success' => 1,
	  						'expiration' => $fechaout
	  					]);
	  					DB::table('data_sites_hacienda')->insert([
	  						'lastname' => $lastname_upper,
	  						'wificode' => $usuariojunto,
	  						'site_id' => $site_info[0]->id,
	  						'reservation_id' => $sql_good->reservation_id,
	  						'owner' => $sql_good->owner,
	  						'site_hacienda_id' => $request->id_site_code,
	  						'expiration' => $fechaout
	  					]);
						DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
							'register_id' => $sql_good->id,
							'reservation_id' => $sql_good->reservation_id,
							'siteid' => $request->id_site_code,
							'service_id' => $service_id,
							'service_price' => $service_price,
							'service_drate' => $service_drate,
							'service_urate' => $service_urate,
							'service_expiration' => $service_expiration,
							'service_devices' => $service_devices,
							'service_name' => $service_name,
							'activation_datetime' => Carbon::now(),
							'account' => $usuariojunto,
							'mac' => $client_mac_new,
							'device' => $platform,
							'status' => 'active',
							'transactiondate' => Carbon::now(),
						]);
						// insert en radius.
						$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
						usleep(5000);
						return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
					}else{
						// ya tiene un cargo, checar si ya vencio.
						$datenow = Carbon::now();
						$date_register = Carbon::parse($check_pay_reservation->activation_datetime)->addDays($check_pay_reservation->service_expiration[0]);
						if ($datenow->greaterThan($date_register)) {
							// ya expiro, crear otro cargo.
							// puede continuar con el cobro no es miembro.
							// insert
							$fechain = Carbon::now();
							$fechaout = $fechain->addDays($expiration_db)->format('Y-m-d H:i:s');
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
		  						'success' => 1,
		  						'expiration' => $fechaout
		  					]);
		  					DB::table('data_sites_hacienda')->insert([
		  						'lastname' => $lastname_upper,
		  						'wificode' => $usuariojunto,
		  						'site_id' => $site_info[0]->id,
		  						'reservation_id' => $sql_good->reservation_id,
		  						'owner' => $sql_good->owner,
		  						'site_hacienda_id' => $request->id_site_code,
		  						'expiration' => $fechaout
		  					]);
							DB::connection('hacienda_sqlsrv_practice')->table('imm_accounts')->insert([
								'register_id' => $sql_good->id,
								'reservation_id' => $sql_good->reservation_id,
								'siteid' => $request->id_site_code,
								'service_id' => $service_id,
								'service_price' => $service_price,
								'service_drate' => $service_drate,
								'service_urate' => $service_urate,
								'service_expiration' => $service_expiration,
								'service_devices' => $service_devices,
								'service_name' => $service_name,
								'activation_datetime' => Carbon::now(),
								'account' => $usuariojunto,
								'mac' => $client_mac_new,
								'device' => $platform,
								'status' => 'active',
								'transactiondate' => Carbon::now(),
							]);
							// insert en radius.
							$this->insertRadCloud($usuariojunto, $sql_good->name, $sql_good->lastname, $site, $expiration_db);
							usleep(5000);

							return response()->json(['status' => 1, 'msg' => 'The charge was applied correctly. Logging in.', 'user' => $usuariojunto]);
						}else{
							// todavia no expira, retornar mensaje.
							return response()->json(['status' => 4, 'msg' => 'You still have internet access, check browse with existing account option']);
						}
					}
				}else{
					return response()->json(['status' => 3, 'msg' => 'You are not a member, use a non member option to have internet access.']);
				}
			}
		}
    	return '0';
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

    public function insertRadCloud($user, $name, $lastname, $site_code, $exp)
    {
		$atr1="Auth-Type";
		$atr2="Cleartext-Password";
		$atr3="Expiration";
		$op =":=";
		$Tipo="Local";
		$passglobal = "123";
		$createby = "administrator";
		// $codigo_sitio = "ZCJG";
		$group = "hacienda_premium1";

		$fechain = Carbon::now();
		$fechaout = $fechain->addDays($exp)->format('Y-m-d H:i:s');
		$fechamod = Carbon::parse($fechaout)->format('d M Y H:i:s');
		

		/*$fechain = date("Y-m-d H:i:s");
        $fechaout = strtotime ( '+1 day' , strtotime ( $fechain ) ) ;
        $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );
		$fechamod = date ("d M Y H:i:s", strtotime($fechaout)); //Fecha out(expiration)*/

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
}
