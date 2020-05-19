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

    public function procedure1(Request $request)
    {
        // Procedures

        //'CALL get_gender_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
        //'CALL get_mobile_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
        //'CALL get_language_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));
        //'CALL get_domain_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

        //$res = DB::connection('rad_freewifi')->select('CALL get_gender_chain_venue(?,?,?,?)', array($chain,$venue,$fecha_ini,$fecha_fin));

        //return $res;
    }
}
