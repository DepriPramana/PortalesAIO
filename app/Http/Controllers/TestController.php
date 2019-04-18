<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;
use Session;
use DB;

class TestController extends Controller
{
	public function testfunc()
	{  
        $ip = '172.20.0.2';
        $zd = 'http://' . $ip . ':9997/login';
        $sz = 'https://'. $ip.':9998/SubscriberPortal/hotspotlogin';

        $agent = new Agent();
        $bool = $agent->isDesktop();
        $device = $agent->device();

        $robot = $agent->isRobot();
        if ($robot) {
          $robot_name = $agent->robot();  
        }else{
          $robot_name = '';
        }
        
        $mobile = $agent->isPhone();
        // iPhone
        // iOS
        $languages = $agent->languages();

        $browser = $agent->browser();
        $version1 = $agent->version($browser);

        $platform = $agent->platform();

        //$version2 = $agent->version($platform);
        if ($agent->version($platform)) {
          $version2 = $agent->version($platform);
        }else{
          $version2 = '';
        }

    		dd($browser);
	}
  public function creandosession(Request $request)
  {

    session(['sip' => $request->sip]);
    session(['mac' => $request->mac]);
    session(['client_mac' => $request->client_mac]);
    session(['uip' => $request->uip]);
    session(['ssid' => $request->ssid]);
    session(['vlan' => $request->vlan]);
    session(['res' => $request->res]);
    session(['auth' => $request->auth]);
    return 'OK';
  }

}