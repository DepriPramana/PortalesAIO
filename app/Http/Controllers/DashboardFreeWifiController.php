<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardFreeWifiController extends Controller
{
    public function index()
    {
        return view('visitor.DashboardFreeWifi.index');

    }

    public function index2()
    {
        return view('visitor.DashboardFreeWifi.index_graficas');
    }
}
