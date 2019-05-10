<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Agent\Agent;

class UnitecController extends Controller
{
    public function login_unitec(Request $request)
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
        dd('algo');
        //Fin Agent
        // Parámetros de logeo

    }
}
