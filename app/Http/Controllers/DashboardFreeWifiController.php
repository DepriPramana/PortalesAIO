<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardFreeWifiController extends Controller
{
    /*protected $chains;

    public function __construct()
    {
        $this->chains = DB::connection('cloudalice')->table('cadenas')->where('hotspot', 1)->get();
    }*/
    public function testing()
    {
      $res = DB::connection('freewifi_data')->select('CALL px_get_sessions24h_chain(?,?,?)', array(26,'2020-07-01','2020-07-09'));
      //procedure de sumarizacion de datos por dia, px_get_sessions24h_acumula(fecha)
      //$res = DB::connection('freewifi_data')->select('CALL get_sessions24h_chain(?,?,?)', array(26,'2020-07-01','2020-07-09'));

      $res2 = DB::connection('freewifi_data')->select('CALL px_get_age_chain(?,?,?)', array(26,'2020-07-01','2020-07-09'));
      //procedure px_get_age_acumula(fecha)
      //$res3 = DB::connection('freewifi_data')->select('CALL get_age_chain(?,?,?)', array(26,'2020-07-01','2020-07-09'));
      dd($res,$res2,$res3);
    }
    public function index()
    {
        //return view('visitor.DashboardFreeWifi.index');
        abort(503,'Modulo en mantenimiento');

    }
    public function index3()
    {
      //$chains = DB::connection('cloudalice')->table('cadenas')->where('hotspot', 1)->get();
      return view('visitor.DashboardFreeWifi.index_testing');
      //abort(503,'Modulo en mantenimiento');
    }
    public function sessions()
    {
        //return view('visitor.DashboardFreeWifi.sessions')->with("chains", $this->chains);
        abort(503,'Modulo en mantenimiento');
    }
    public function sessions_report()
    {
      $chains = DB::connection('cloudalice')->table('cadenas')->where('hotspot', 1)->get();
      return view('visitor.DashboardFreeWifi.sessions_report')->with("chains", $chains);
      //abort(503,'Modulo en mantenimiento');
    }
    public function users()
    {
        return view('visitor.DashboardFreeWifi.users')->with("chains", $this->chains);
    }

    public function devices()
    {
        return view('visitor.DashboardFreeWifi.devices')->with("chains", $this->chains);
    }

    public function index2()
    {
        $chains = DB::connection('cloudalice')->table('cadenas')->where('hotspot', 1)->get();

        //$chains = 0;
        return view('visitor.DashboardFreeWifi.index_graficas', compact('chains'));
    }

    public function get_hotelsbycadena(Request $request)
    {
      $chain = $request->scope;
      $hotels = DB::connection('cloudalice')->table('hotels')->select('id', 'Nombre_hotel')->where('hotspot', 1)->where('cadena_id', $chain)->get();

      return $hotels;
    }
    public function get_sessions(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('cloudport_freewifi')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      //$res = DB::connection('freewifi_data')->select('CALL get_sessions24h_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));
      $res = DB::connection('cloudport_freewifi')->select('CALL px_get_sessions24h_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_browsers(Request $request)
    {

      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('cloudport_freewifi')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      //$res = DB::connection('freewifi_data')->select('CALL get_browser_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));
      $res = DB::connection('cloudport_freewifi')->select('CALL px_get_browser_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

        $result = [];

        foreach ($res as $key => $value)
        {
            $result[$key] = $value->cantidad;
        }

        array_multisort($result, SORT_DESC, $res);

        return $res;

      return $res;

      /*for ($i=0; $i < count($venue); $i++) {
        $res = DB::connection('freewifi_data')->select('CALL get_browser_chain_venue(?,?,?,?)', array($chain,$venue[$i],$fecha_ini,$fecha_fin));
        array_push($dataset, $res);
      }
      return $dataset;*/

    }

    public function get_platforms(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_platform_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

        $result = [];

        foreach ($res as $key => $value)
        {
            $result[$key] = $value->Cantidad;
        }

        array_multisort($result, SORT_DESC, $res);

      return $res;

      /*for ($i=0; $i < count($venue); $i++) {
        $res = DB::connection('freewifi_data')->select('CALL get_platform_chain_venue(?,?,?,?)', array($chain,$venue[$i],$fecha_ini,$fecha_fin));
        array_push($dataset, $res);
      }
      return $dataset;*/
    }

    public function get_devices(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_device_chain(?,?,?)', array($chain, $fecha_ini,$fecha_fin));


      $result = [];

        foreach ($res as $key => $value)
        {
            $result[$key] = $value->Cantidad;
        }

        array_multisort($result, SORT_DESC, $res);

      return $res;

      /*for ($i=0; $i < count($venue); $i++) {
        $res = DB::connection('freewifi_data')->select('CALL get_platform_chain_venue(?,?,?,?)', array($chain,$venue[$i],$fecha_ini,$fecha_fin));
        array_push($dataset, $res);
      }
      return $dataset;*/
    }

    public function get_ages(Request $request)
    {

      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('cloudport_freewifi')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $todos= [];

      //$res = DB::connection('freewifi_data')->select('CALL get_age_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));
      $res = DB::connection('cloudport_freewifi')->select('CALL px_get_age_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));


      $categories =
          [
              ["label" => "10 - 19 años", "total" => 0, "min" => 10, "max" => 19],
              ["label" => "20 - 29 años", "total" => 0, "min" => 20, "max" => 29],
              ["label" => "30 - 39 años", "total" => 0, "min" => 30, "max" => 39],
              ["label" => "40 - 49 años", "total" => 0, "min" => 40, "max" => 49],
              ["label" => "50 - 59 años", "total" => 0, "min" => 50, "max" => 59],
              ["label" => "60 - 69 años", "total" => 0, "min" => 60, "max" => 69],
              ["label" => "70 y más", "total" => 0, "min" => 70, "max" => 110]
          ];


          foreach ($categories as $key => $value)
          {
              foreach ($res as  $val)
              {

              if(( $categories[$key]["min"] <= $val->age ) && ($val->age <= $categories[$key]["max"]))
              {
                  $categories[$key]["total"] = $categories[$key]["total"] + $val->cantidad;
                  //$categories[$key]["total"] ++ ;
              }
          }
      }
      array_push($todos, $res);
      array_push($todos, $categories);

      return $todos;

    }
    public function get_domains(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_domain_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

      $categories["gmail"] = ["name" => "Gmail", "color" => "#e66363", "total" => 0];
      $categories["hotmail"] = ["name" => "Hotmail", "color" => "#60ace6", "total" => 0];
      $categories["live"] = ["name" => "Live", "color" => "#e8e068", "total" => 0];
      $categories["outlook"] = ["name" => "Outlook", "color" => "#e0a65e", "total" => 0];
      $categories["icloud"] = ["name" => "iCloud", "color" => "#98d975", "total" => 0];
      $categories["yahoo"] = ["name" => "Yahoo", "color" => "#a65ee0", "total" => 0];
      $categories["others"] = ["name" => "Otros", "color" => "#c4c4c4", "total" => 0];



       foreach ($res as $val)
      {
          foreach ($categories as $key => $value)
          {
              if($key == $val->domain)
              {
                  $categories[$key]['total'] += $val->Cantidad;
              }
          }

          if(!array_key_exists($val->domain, $categories))
          {
              $categories['others']["total"] ++;
          }
      }


      return $categories;
    }

    public function get_countries(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_country_chain(?,?,?)', array($chain, $fecha_ini,$fecha_fin));

      return $res;
    }

    public function get_genders(Request $request)
    {

      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_gender_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

      $result['Masculino']  = [];
      $result['Femenino']   = [];
      $result['NoDefinido'] = [];

      foreach ($res as $value)
      {
          if($value->gender == "Masculino")
          {
              $result["Masculino"] = $value;
          }

          else if($value->gender == "Femenino")
          {
              $result["Femenino"] = $value;
          }

          else
          {
              $result["NoDefinido"]['gender'] = "NoDefinido";
              $result["NoDefinido"]['Cantidad'] = $value->Cantidad;
          }

      }

      foreach ($result as $key => $value)
      {
          if($key == "Masculino" && !$value)
          {
              $result["Masculino"]['gender'] = "Masculino";
              $result["Masculino"]['Cantidad'] = 0;
          }

          if($key == "Femenino" && !$value)
          {
              $result["Femenino"]['gender'] = "Femenino";
              $result["Femenino"]['Cantidad'] = 0;
          }

          if($key == "NoDefinido" && !$value)
          {
              $result["NoDefinido"]['gender'] = "NoDefinido";
              $result["NoDefinido"]['Cantidad'] = 0;
          }

      }


      return $result;

    }
    public function get_mobiles(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }


      $res = DB::connection('freewifi_data')->select('CALL get_mobile_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_languages(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $res = DB::connection('freewifi_data')->select('CALL get_language_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

        $result = [];

        foreach ($res as $key => $value)
        {
            $result[$key] = $value->Cantidad;
        }

        array_multisort($result, SORT_DESC, $res);

      return $res;
    }

    public function procedure1(Request $request)
    {
        // Procedures
        //'CALL get_browser_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin)); ***
        //'CALL get_platform_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin)); ***
        //'CALL get_device_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin)); ***

        //'CALL get_age_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

        //'CALL get_domain_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

        //'CALL get_gender_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin)); ***
        //'CALL get_mobile_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
        //'CALL get_language_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
        //'CALL get_sessions24h_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));


        //$res = DB::connection('rad_freewifi')->select('CALL get_gender_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

        //return $res;
    }

    public function hotspotGraphicData( Request $request )
    {

      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;
      $resultSet = [];
      $procedure = "";

      if (!empty($venue)) {
        for ($i=0; $i < count($venue); $i++) {
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }
      switch($request->option) {
        case 0: $procedure = "CALL get_user_login_day_chain(?,?,?)"; break;
        case 1: $procedure = "CALL get_unique_user_day_chain(?,?,?)"; break;
        case 2: $procedure = "CALL get_new_user_day_chain(?,?,?)"; break;
        case 3: $procedure = "CALL get_mb_download_chain(?,?,?)"; break;
        case 4: $procedure = "CALL get_mb_upload_chain(?,?,?)"; break;
        case 5: $procedure = "CALL get_avg_min_session_chain(?,?,?)"; break;
        case 6: $procedure = "CALL get_revenue_total_session_chain(?,?,?)"; break;
      }
      $resultSet = DB::connection('freewifi_data')->select($procedure, array($chain,$fecha_ini,$fecha_fin));
      return response()->json($resultSet);

    }

}
