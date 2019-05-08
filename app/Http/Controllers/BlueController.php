<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;

class BlueController extends Controller
{
	private $user_code;

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
		$email = $request->email;
		$wificode = $request->wificode; // Wificode.
		$firstname = $request->apellido; // Nombre.
		$lastname = $request->nombre; // Apellido.
		$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
		$site_name = $site_info[0]->nombre;
		$db_user = DB::connection('sunrisezq')->table('authtoken')->select('username')->where('username', $wificode)->count();
		$fechain = date("Y-m-d H:i:s");
		$this->user_code = $wificode;

    	// $db_check = DB::connection('sunrisezq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	// dd($db_check);

      	if ($db_user > 0) {
      		// Existe codigo.
            if ($this->checarEXP($wificode)) {
            	$usuariojunto = $this->user_code;
				return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
            }else{
                $this->checkProfile($wificode, $fechain);

                if ($this->user_code === 'MALCODIGO') {
                	$usuariojunto = $this->user_code;
                	return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));	
                }else{
                	$usuariojunto = $this->user_code;
                	$this->insertData($firstname, $lastname, $email);
					return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
                }
            }
      	}else{
      		//no existe codigo.
      		$usuariojunto = $this->user_code;
			return view('visitor.submitx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
      	}
    }
    public function checarEXP($wificode){
        $atr3="Expiration";
        $db_exp = DB::connection('sunrisezq')->table('radcheck')->select('Attribute')->where('UserName', $wificode)->count();
        // $stmt = "SELECT count(Attribute) Attribute FROM radcheck WHERE UserName = ?";
        // $atributo = $row['Attribute'];
        if ($db_exp > 2) {
            return TRUE;
        }
        return FALSE;
    }
    public function checkProfile($wificode){
    	$db_check = DB::connection('sunrisezq')->table('authtoken')->select('profile')->where('username', $wificode)->value('profile');
    	$fechain = date("Y-m-d H:i:s");
        // $profile = $row['profile'];
        $codigo = $wificode;
        switch ($db_check) {
            case 'bbay-1dia':
            	$this->user_code = 'MALCODIGO';
                break;
            case 'bbay-3dias':
                $this->user_code = 'MALCODIGO';
                break;
            case 'bbay-7dias':
            	$this->user_code = 'MALCODIGO';
                break;
            case 'circleone':
            	$this->user_code = 'MALCODIGO';
                break;
            case 'bbay-free':
                $fechaout = strtotime ( '+14 day' , strtotime ( $fechain ) ) ;
                $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );

                $this->updateAuth($wificode, $fechaout);
                $this->insertRadChk($wificode, $fechaout);

                break;
        }
    }
    public function updateAuth($wificode, $fecha){
    	DB::connection('sunrisezq')->table('authtoken')->where('username', $wificode)->update(['expiration' => $fecha]);
		// $stmt = "UPDATE authtoken SET expiration = ? WHERE username = ?";
		// $query1 = $this->dbConxZQ->prepareQ($stmt);
		// $query1->bindParam(1, $fecha);
		// $query1->bindParam(2, $user);
		// $query1->execute();
    }
    public function insertRadChk($wificode, $fecha){   
        $atr="Expiration";
        $op ="+=";
        $fechaout = date ("d M Y H:i:s", strtotime($fecha));

  		DB::connection('sunrisezq')->table('radcheck')->insert(
  			['UserName' => $wificode, 'Attribute' => $atr, 'op' => $op, 'Value' => $fechaout]);
        // $stmt = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr3', '$op', ?)";
        // $query1 = $this->dbConxZQ->prepareQ($stmt);
        // $query1->bindParam(1, $user);
        // $query1->bindParam(2, $fechaout);
        // $query1->execute(); 
    }
    public function insertData($name, $lastname, $email){
    	$code = $this->user_code;
    	// 006keo3x
    	DB::connection('sunrisezq')->table('datosbluebay')->insert(
    		['firstname' => $name, 'lastname' => $lastname, 'email' => $email, 'wificode' => $code]);

    }
    public function cleanString($str){
        $str = str_replace("Ñ" ,"N", $str);
        $str = str_replace("ñ" ,"n", $str);
        return $str;
    }
	public function validate_email(Request $request){
		$exp = "^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$"; // validacion de correo.

		$email = $request->email;
		$domain = explode('@', $email);
		$size = count($domain);

		if ($size > 1) {
			if (checkdnsrr($domain[1])){
				return "TRUE";
			}else{
				return "FALSE";
			}
		}else{
			return 'FALSE';
		}
	}
}
