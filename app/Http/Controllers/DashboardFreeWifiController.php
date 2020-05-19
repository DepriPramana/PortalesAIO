<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardFreeWifiController extends Controller
{
    public function Index()
    {
        return view('visitor.DashboardFreeWifi.index');

    }
}
