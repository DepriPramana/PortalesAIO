<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardFreeWifiController extends Controller
{
    public function index()
    {
        return view('visitor.DashboardFreeWifi.index');

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
    public function get_browsers(Request $request)
    {
      //return $request;

      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_browser_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
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

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_platform_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

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

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_device_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

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

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_age_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;

    }
    public function get_domains(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_domain_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_genders(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_gender_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_mobiles(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_mobile_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_languages(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_language_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

      return $res;
    }
    public function get_sessions(Request $request)
    {
      $chain = $request->select_scope;
      $venue = $request->select_hotspots;
      $fecha_ini = $request->datepickerWeek;
      $fecha_fin = $request->datepickerWeek2;

      $dataset = array();

      $res = DB::connection('freewifi_data')->select('CALL get_sessions24h_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

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
