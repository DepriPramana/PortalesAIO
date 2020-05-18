<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardFreeWifiController extends Controller
{
    public function Index()
    {
        return response("Dashboard", 200);
    }
}
