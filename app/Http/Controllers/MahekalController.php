<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;

class MahekalController extends Controller
{
	private $user_code;

    public function login_mahekal(Request $request)
    {

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
    		$email = $request->email; // Correo.
    		$wificode = $request->wificode; // Wificode.
    		$firstname = $request->apellido; // Nombre.
    		$lastname = $request->nombre; // Apellido.
    		$roomnumber = $request->roomnumber; // Habitacion.
    		$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    		$site_name = $site_info[0]->nombre;
    		$db_user = DB::connection('mahekalzq')->table('authtoken')->select('username')->where('username', $wificode)->count();
    		$fechain = date("Y-m-d H:i:s");
    		$this->user_code = $wificode;
        // End parametros.    
    	// $db_check = DB::connection('mahekalzq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	// dd($db_check);

      	if ($db_user > 0) {
      		// Existe codigo.
            if ($this->checkProfile($wificode)) {
                // echo " - true checkprofile  - ";
                $this->insertData($firstname, $lastname, $email, $wificode, $roomnumber);
                $usuariojunto = $this->user_code;
                return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
                // $this->loginZD($wificode);
            }else{
                
                $this->insertData($firstname, $lastname, $email, $wificode, $roomnumber);
                $usuariojunto = 'MALCODIGO';
                return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
                // $this->loginZD('MAL CODIGO');
            }
      	}else{
      		//no existe codigo.
      		$usuariojunto = 'MALCODIGO';
			return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
      	}
    }
    public function login_mahekal_vip(Request $request)
    {

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
    		$email = $request->email; // Correo.
    		$wificode = $request->wificode; // Wificode.
    		$firstname = $request->apellido; // Nombre.
    		$lastname = $request->nombre; // Apellido.
    		$roomnumber = $request->roomnumber; // Habitacion.
    		$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
    		$site_name = $site_info[0]->nombre;
    		$db_user = DB::connection('mahekalzq')->table('authtoken')->select('username')->where('username', $wificode)->count();
    		$fechain = date("Y-m-d H:i:s");
    		$this->user_code = $wificode;
        // End parametros.    
    	// $db_check = DB::connection('mahekalzq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	// dd($db_check);

      	if ($db_user > 0) {
      		// Existe codigo.
            if ($this->checkProfile_vip($wificode)) {
                // echo " - true checkprofile  - ";
                $this->insertData($firstname, $lastname, $email, $wificode, $roomnumber);
                $usuariojunto = $this->user_code;
                return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
                // $this->loginZD($wificode);
            }else{
                
                $this->insertData($firstname, $lastname, $email, $wificode, $roomnumber);
                $usuariojunto = 'MALCODIGO';
                return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
                // $this->loginZD('MAL CODIGO');
            }
      	}else{
      		//no existe codigo.
      		$usuariojunto = 'MALCODIGO';
			return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
      	}
    }
    public function checkProfile($wificode){
    	$db_check = DB::connection('mahekalzq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	$fechain = date("Y-m-d H:i:s");
        // $profile = $row['profile'];
        $codigo = $wificode;
        switch ($db_check) {
            case 'mahekal':
                return TRUE;
                break;
            case 'mahekal_vip':
                return FALSE;
                break;
            case 'default':
                return TRUE;
            default:
                return FALSE;
                break;
        }
    }
    public function checkProfile_vip($wificode){
    	$db_check = DB::connection('mahekalzq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	$fechain = date("Y-m-d H:i:s");
        // $profile = $row['profile'];
        $codigo = $wificode;
        switch ($db_check) {
            case 'mahekal':
                return FALSE;
                break;
            case 'mahekal_vip':
                return TRUE;
                break;
            case 'default':
                return TRUE;
            default:
                return FALSE;
                break;
        }
    }
    public function insertData($name, $lastname, $email, $roomnumber){
    	$code = $this->user_code;
    	// 006keo3x
    	DB::connection('mahekalzq')->table('dataMahekal')->insert(
    		['firstname' => $name, 'lastname' => $lastname, 'email' => $email, 'wificode' => $code, 'room_number' => $roomnumber]);
    }

}
