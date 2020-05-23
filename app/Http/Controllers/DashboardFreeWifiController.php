<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardFreeWifiController extends Controller
{
    protected $chains;

    public function __construct()
    {
        $this->chains = DB::connection('cloudalice')->table('cadenas')->where('hotspot', 1)->get();
    }

    public function index()
    {
        return view('visitor.DashboardFreeWifi.index');

    }

    public function sessions()
    {
        return view('visitor.DashboardFreeWifi.sessions')->with("chains", $this->chains);
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

    public function sessions_report()
    {
        return view('visitor.DashboardFreeWifi.sessions_report')->with("chains", $this->chains);
    }


    public function get_hotelsbycadena(Request $request)
    {
      $chain = $request->scope;
      $hotels = DB::connection('cloudalice')->table('hotels')->select('id', 'Nombre_hotel')->where('hotspot', 1)->where('cadena_id', $chain)->get();

      return $hotels;
    }
    public function get_browsers(Request $request)
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

      $res = DB::connection('freewifi_data')->select('CALL get_browser_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

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
          DB::connection('freewifi_data')->table('venues_aux')->insert([
            'venue_id'=> $venue[$i]
          ]);
        }
      }

      $all_ages = [];

      $res = DB::connection('freewifi_data')->select('CALL get_age_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

      $categories =
          [
              ["label" => "10 - 19 años", "total" => 0, "min" => 10, "max" => 19],
              ["label" => "20 - 29 años", "total" => 0, "min" => 20, "max" => 29],
              ["label" => "30 - 39 años", "total" => 0, "min" => 30, "max" => 39],
              ["label" => "40 - 49 años", "total" => 0, "min" => 40, "max" => 49],
              ["label" => "50 - 59 años", "total" => 0, "min" => 50, "max" => 59],
              ["label" => "60 - 69 años", "total" => 0, "min" => 60, "max" => 69],
              ["label" => "70 - 79 años", "total" => 0, "min" => 70, "max" => 79],
              ["label" => "80 - 89 años", "total" => 0, "min" => 80, "max" => 89]
          ];


          foreach ($categories as $key => $value)
          {
              foreach ($res as  $val)
              {

              if(( $categories[$key]["min"] <= $val->age ) && ($val->age <= $categories[$key]["max"]))
              {
                  $categories[$key]["total"] ++ ;
              }
          }
      }

      return $categories;



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

      return $res;
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

      return $res;
    }
    public function get_sessions(Request $request)
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

      $res = DB::connection('freewifi_data')->select('CALL get_sessions24h_chain(?,?,?)', array($chain,$fecha_ini,$fecha_fin));

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

}
