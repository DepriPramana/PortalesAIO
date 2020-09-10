<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;

class NyxController extends Controller
{
  public $reservation;
  public $name_pms;
  public $lastname_pms;
  public $fecha_nac_pms;
  public $email_pms;

  public function login_free(Request $request)
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

      $this->reservation = $request->reserva;
      $this->name_pms = $request->name;
      $this->lastname_pms = $request->lastname;
      $this->fecha_nac_pms = $request->fecha_nac;
      $this->email_pms = $request->email_address;

      $client_mac_new = $this->AddSeparator($client_mac);
      // $mac_testing = mb_convert_case($client_mac, MB_CASE_UPPER, "UTF-8");

      //$site_info = DB::table('sites')->select('id','nombre')->where('code', $site)->get();
      //$site_name = $site_info[0]->nombre;
      $usuariojunto = 'HACIENDAFREE';

      /*DB::table('data_agents_hacienda')->insert([
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
      ]);*/
      $algo = $this->pms_request();

      //$algo->Bookings[0]->Guests[0]->Contact->Email = array('putoooo@sdasd.com');
      //dd($algo);
      //dd($algo->Bookings[0]->Guests[0]->Contact);

      if(gettype($algo) == 'integer'){
        return 0; // Fallo
      }
      if (count($algo->Bookings) > 1) {
        return 'mas de 1 booking';
      }

      $bandera_json = $this->pms_update($algo);

      dd($bandera_json);

      return $algo;

      //return view('visitor.submitx_nyx', compact('site_name','usuariojunto','url','proxy','sip','mac','client_mac','uip','ssid','vlan'));
    }
    public static function AddSeparator($mac, $separator = ':')
  	{
  		$mac = mb_convert_case($mac, MB_CASE_UPPER, "UTF-8");
  		return join($separator, str_split($mac, 2));
  	}

    public function pms_request() //prueba NYX API (winhotel)
    {

        // URL TEST: http://queryapitest.winhotelweb.com/help
        // User: Sit-Wifi
        // Password: StWf-z123
        // HotelSourceCode/HotelTargetCode: TestNyx

        //$url_test = 'http://queryapitest.winhotelweb.com/query/PublicQuery/ContactsSummaryRoomDayListQuery';
        $url_test = 'http://queryapitest.winhotelweb.com/query/PublicQuery/BookingListQuery'; // query inicial
        $user = 'Sit-Wifi';
        $password = 'StWf-z123';
        $hotel_code = 'TestNyx';
        // variables antiguas.
        // $user = 'WiFiNYX';
        // $password = 'WFNYX-z123';
        // $hotel_code = 'NyxTest';
        $room = "2314";
        $date = "2019-03-10";

        // Localizers ejemplos:
        // 15842818
        // 21622004
        // 1825845985
        // 72307831-2

        $localizer = $this->reservation;
        $BLQP_Value1 = 1; //Reservada
        $BLQP_Value2 = 2; //Ocupada

        //$userID = 'd248c3d9-1e0c-4990-9db8-56d264a5aaad';

        //$array_algo = array('ticket' => array('type' => $type_ticket, 'priority' => $priority_ticket, 'custom_fields' => array(array('id' => 22892328, 'value' => $itcasignado),array('id' => 22881472, 'value' => $name_cliente),array('id' => 22881552, 'value' => $empresa)),'status' => $status, 'tags' => $tags,'comment' => array('body' => $comment, 'public' => $public_b ,'author_id' => $author_id)));
        //$query_winhotel = array('QueryCredentials' => array('User' => $user, 'Password' =>  $password, 'UserPasswordToken' => ''),
        //                          'QueryRequest' => array('QueryHeader' => array('HotelCodeMap' => array('HotelSourceCode' => $hotel_code, 'HotelTargetCode' => $hotel_code), 'MaxRowsResponse' => 1),
        //                            'ContactsRoomDayQueryParameters' => array('Date' => $date, 'RoomCode' => $room), 'UserID' => ''));

        $query_winhotel = array ('QueryCredentials' =>
                                  array (
                                    'User' => $user,
                                    'Password' => $password,
                                    'UserPasswordToken' => '',
                                  ),
                                  'QueryRequest' =>
                                    array (
                                      'QueryHeader' =>
                                      array (
                                        'HotelCodeMap' =>
                                        array (
                                          'HotelSourceCode' => $hotel_code,
                                          'HotelTargetCode' => $hotel_code,
                                        ),
                                        'MaxRowsResponse' => 1,
                                      ),
                                      'BookingListQueryParameters' =>
                                        array (
                                          'LocalizerQueryParameter' =>
                                            array (
                                              'QueryOperator' => 0,
                                              'Value' => $localizer,
                                            ),
                                          'BookingStateQueryParameters' =>
                                            array (
                                              0 =>
                                              array (
                                                'QueryOperator' => 0,
                                                'Value' => $BLQP_Value1,
                                              ),
                                              1 =>
                                              array (
                                                'QueryOperator' => 0,
                                                'Value' => $BLQP_Value2,
                                              ),
                                            ),
                                        ),
                                      'UserID' => '7348b524-90ad-4d47-b3b7-ac9a9a124974',
                                    ),
                            );


        //dd($query_winhotel);
        $json = json_encode($query_winhotel);
        //$this->info($json);
        $ch = curl_init();
        //echo "Inicializa la funcion .. ";
        curl_setopt($ch, CURLOPT_TIMEOUT, 50);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false );
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
        curl_setopt($ch, CURLOPT_URL, $url_test);
        //curl_setopt($ch, CURLOPT_USERPWD, "jesquinca@sitwifi.com/token:f4qs3fDR9b9J635IcP6Ce5cGXxKx32ewexk3qmvz");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        //echo ".. Termina la funcion ..";
        $output = curl_exec($ch);

        $curlerr = curl_error($ch);
        $curlerrno = curl_errno($ch);

        if ($curlerrno != 0) {
            // Retornar un num de error
            return 0;
        }
        curl_close($ch);
        $decoded = json_decode($output);
        return $decoded;
        //dd($decoded);
    }
    public function pms_update($jsondata)
    {
      $url_test = 'http://queryapitest.winhotelweb.com/query/PublicQuery/GuestUpdate'; // query inicial
      $user = 'Sit-Wifi';
      $password = 'StWf-z123';
      $hotel_code = 'TestNyx';
      $BLQP_Value1 = 1; //Reservada
      $BLQP_Value2 = 2; //Ocupada
      // Localizers ejemplos:
      // 15842818
      // 21622004
      // 1825845985
      // 72307831-2

      $booking_id = $jsondata->Bookings[0]->Id;
      $booking_code = $jsondata->Bookings[0]->Code;

      $guests = $jsondata->Bookings[0]->Guests;

      $iterator = $this->get_iterator($guests);
      // ya tengo a quien cambiar

      //$guest_code = $jsondata->Bookings[0]->Guests[$iterator]->Code;
      //$contact_code = $jsondata->Bookings[0]->Guests[$iterator]->Contact->Code;
      //Nombre global
      $guests[$iterator]->Name = $this->name_pms . ' ' . $this->lastname_pms;
      //Nombre de contacto
      $guests[$iterator]->Contact->ContactName = $this->name_pms . ' ' . $this->lastname_pms;
      // Nombre
      $guests[$iterator]->Contact->Name = $this->name_pms;
      //Apellido
      $guests[$iterator]->Contact->SurName = $this->lastname_pms;
      //correo
      $guests[$iterator]->Contact->Emails = array($this->email_pms);
      //dd($contact_code);
      //$guest_code = 'HUES-126767';
      //$contact_code = 'HUES-126767';



      $query_update = array (
        'QueryCredentials' =>
        array (
          'User' => $user,
          'Password' => $password,
          'UserPasswordToken' => '',
        ),
        'QueryRequest' =>
        array (
          'QueryHeader' =>
          array (
            'HotelCodeMap' =>
            array (
              'HotelSourceCode' => $hotel_code,
              'HotelTargetCode' => $hotel_code,
            ),
            'MaxRowsResponse' => 1,
          ),
          'UpdateGuestsRequest' =>
          array (
            'BookingCode' => $booking_code,
            'Guests' => $guests,
          ),
          'UserID' => 'c53fb6c7-7b6c-4200-b1c3-1a3151c70c09',
        ),
      );


      $json = json_encode($query_update);
      //$this->info($json);
      $ch = curl_init();
      //echo "Inicializa la funcion .. ";
      curl_setopt($ch, CURLOPT_TIMEOUT, 50);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false );
      curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
      curl_setopt($ch, CURLOPT_URL, $url_test);
      //curl_setopt($ch, CURLOPT_USERPWD, "jesquinca@sitwifi.com/token:f4qs3fDR9b9J635IcP6Ce5cGXxKx32ewexk3qmvz");
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
      curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);

      //echo ".. Termina la funcion ..";
      $output = curl_exec($ch);

      $curlerr = curl_error($ch);
      $curlerrno = curl_errno($ch);

      if ($curlerrno != 0) {
          // Retornar un num de error
          return 0;
      }
      curl_close($ch);
      $decoded = json_decode($output);
      return $decoded;
      //dd($decoded);
    }
    public function get_iterator($json)
    {
      $contador = count($json);
      $iterator = 0;
      for ($i=0; $i < $contador; $i++) {
        //$json[$i]->name;
        $search_name = stristr($json[$i]->Name, $this->name_pms);
        if (!empty($search_name)) {
          $iterator = $i;
        }
      }
      //stristr($string, 'search');
      return $iterator;
    }
}
