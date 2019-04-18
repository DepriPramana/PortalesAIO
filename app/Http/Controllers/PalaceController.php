<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Session;
use DB;

class PalaceController extends Controller
{	
private $xmlreq=<<<XML
<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><Post_ObtenerInfoRoomPorHabitacion xmlns="http://localhost/xmlschemas/postserviceinterface/16-07-2009/"><RmroomRequest xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/RmroomRequest.xsd"><Rmroom><hotel xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></hotel><room xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></room></Rmroom><rooms /></RmroomRequest></Post_ObtenerInfoRoomPorHabitacion></soap:Body></soap:Envelope>
XML;

    public function login_palace(Request $Request)
    {
    	$agent = new Agent(); // datos del usuario.

        $bool = $agent->isDesktop();
        $device = $agent->device();

        $robot = $agent->isRobot();
        $robot = $agent->robot();

        // iPhone
        // iOS
        $languages = $agent->languages();

        $browser = $agent->browser();
        $version1 = $agent->version($browser);

        $platform = $agent->platform();
        $version2 = $agent->version($platform);
        
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
    	$username = $request->username;
    	$username1 = $request->username1; // Room number.
    	$password = $request->password1; // Apellido.

    	return 'OK';
    }
    public function replaceXML($roominfo){
        //echo " _entre a replaceXML";
        $xmlinfo = $this->xmlreq;
        //var_dump($xmlinfo);
        //echo " Cargue el XML ";

        $stringXML = str_replace('xmlns=', 'ns=', $xmlinfo);
        //echo " remplaze xmlns ";
        //var_dump($string);
        $xmltest = simplexml_load_string($stringXML);
        //echo " cargue el simplexml ";

        foreach ($xmltest->xpath('//Rmroom') as $Rmroom) {
            $Rmroom->hotel = "ZCJG";// <---- Agregar la variable dinamica de Hoteles!
            $Rmroom->room = $roominfo; // <---- Aqui es donde va la variable dinamica
        }
        //echo " pase de FOR__? ";
        $XMLenString = $xmltest->asXML();
        $XMLreq2 = str_replace('ns=', 'xmlns=', $XMLenString);
        //var_dump($XMLreq2);

        return $XMLreq2;
    }
    public function getInfoxHab($xml){
        //echo " _entre a getinforoom ";
        $wsdlloc = "http://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl";
        $accion = "http://localhost/xmlschemas/postserviceinterface/16-07-2009/Post_ObtenerInfoRoomPorHabitacion";
        $option=array('trace'=>1);
        try {
            $soapClient = new SoapClient("http://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl", $option);
            //echo " _ hize la conexion con la api  ";
            $resultRequest = $soapClient->__doRequest($xml, $wsdlloc, $accion, 0);
            //echo " si me dio un resultado  ";
            $soapClient->__last_request = $xml;
            //var_dump($resultRequest);
            //echo "  -REQUEST:\n" . htmlentities($soapClient->__getLastRequest()) . "\n";
            unset($soapClient);
            return $resultRequest;

        } catch (SoapFault $exception) {
            echo "  -REQUEST:\n" . htmlentities($soapClient->__getLastRequest()) . "\n";
            echo $exception->getMessage();
            unset($soapClient);
            return FALSE;
        }
    }
}
