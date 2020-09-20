<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use DB;
use App;


class FreeWifiController extends Controller
{

    private $lang_code;

    public function __construct()
    {
      $agent = new Agent();
      $languages = $agent->languages();

      if (empty($languages[0])) {
        $this->lang_code = 'es';
      }else{
          $first_option = $languages[0];
          $lang = explode('-', $first_option);
          if ($lang != 'es') {
            $this->lang_code = 'en';
          }else{
            $this->lang_code = 'es';
          }
      }
    }

    public function get_freewifi_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.free_wifi_new');
    }
    public function get_metrorrey_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.metrorrey_new');

    }
    public function get_asur_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.asur');
    }
    public function get_metrobus_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.metrobus');
    }
    public function get_ado_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.ado');
    }
    public function get_aryba_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.grupo_aryba');
    }
    public function get_alcaldia_blade()
    {
      App::setLocale($this->lang_code);
      return view('visitor.SitwifiFree.alcaldia_ao');
    }
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

        $vendor = $request->vendor;
        $model = $request->model;
        $type = $request->type;
        $os_name = $request->os_name;
        $os_version = $request->os_version;

        //dd($device, $browser, $browser_version, $platform, $platform_version, $vendor, $model, $type, $os_name, $os_version);
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
        $publicidad = $request->publicidad;
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
      \DB::beginTransaction();
      try {
        $this->insertRadCloudFreeWifi($uuid, 'default', $fechaout, $site_info[0]->ID_VENUE);
        //validacion de newuser e insertar en tabla newusers
        //$validar_insert = DB::connection('freewifi_data')->table('data_agents')->select()->where('mac_address', $client_mac)->where('site_id', $site_info[0]->ID_VENUE)->count();
        $validar_insert = 1;
        if ($validar_insert == 0) {
          DB::connection('freewifi_data')->table('new_users')->insert([
            'MAC' => $client_mac,
            'fecha' => Carbon::now(),
            'venue_id' => $site_info[0]->ID_VENUE,
            'chain_id' => $site_info[0]->ID_CHAIN,
          ]);
        }
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
          'success' => 1,
          'publicidad' => $publicidad
        ]);
        /*DB::connection('freewifi_data')->table('data_sites')->insert([
          'lastname' => $name,
          'email' => $email,
          'wificode' => $uuid,
          'site_id' => $site_info[0]->ID_VENUE,
          'expiration' => $fechaout
        ]);*/
        DB::commit();
      } catch (\Exception $e) {
        DB::rollback();

      } finally {
        DB::disconnect('rad_freewifi');
        DB::disconnect('freewifi_data');
      }

      $site_name = "";
      return view('visitor.submitx_freewifi', compact('user', 'password','url','proxy','sip','mac','client_mac','uip','ssid','vlan', 'url', 'site_name'));
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
          DB::disconnect('rad_freewifi');
    }
}
