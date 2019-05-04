<?php

    require_once("conexionZQ.php");
    require_once("Request.php");

    class procesos
    {

        //public $dbConx;
        public $dbConxZQ;
        public $dbconrad;
        public $request;
        private $stmt;
        //public $counter = 1;
        public $numeroFilas;
        public $nombreHuesped;
public $xmlreq=<<<XML
<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><Post_ObtenerInfoRoomPorHabitacion xmlns="http://localhost/xmlschemas/postserviceinterface/16-07-2009/"><RmroomRequest xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/RmroomRequest.xsd"><Rmroom><hotel xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></hotel><room xmlns="http://localhost/pr_xmlschemas/hotel/01-03-2006/Rmroom.xsd"></room></Rmroom><rooms /></RmroomRequest></Post_ObtenerInfoRoomPorHabitacion></soap:Body></soap:Envelope>
XML;


        function __construct()
        {
            $this->dbConxZQ = DBZQ::getInstance();
            //$this->dbConx = DB::getInstance();
            $this->request = new Request();
        }

        public function setNombre($nom){
            $this->nombreHuesped = $nom;
        }

        public function getNombre(){
            return $this->nombreHuesped;
        }

        public function cleanString($str){
            $str = str_replace("Ñ" ,"N", $str);
            $str = str_replace("ñ" ,"n", $str);
            return $str;
        }

        public function replaceXML($roominfo){
            echo " _entre a replaceXML";
            $xmlinfo = $this->xmlreq;
            var_dump($xmlinfo);
            echo " Cargue el XML ";

            $stringXML = str_replace('xmlns=', 'ns=', $xmlinfo);
            echo " remplaze xmlns ";
            //var_dump($string);
            $xmltest = simplexml_load_string($stringXML);
            echo " cargue el simplexml ";

            foreach ($xmltest->xpath('//Rmroom') as $Rmroom) {
                $Rmroom->hotel = "ZCJG";// <---- Agregar la variable dinamica de Hoteles!
                $Rmroom->room = $roominfo; // <---- Aqui es donde va la variable dinamica
            }
            echo " pase de FOR__? ";
            $XMLenString = $xmltest->asXML();
            $XMLreq2 = str_replace('ns=', 'xmlns=', $XMLenString);
            //var_dump($XMLreq2);

            return $XMLreq2;
        }

        public function getInfoxHab($xml){
            echo " _entre a getinforoom ";
            $wsdlloc = "https://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl";
            $accion = "http://localhost/xmlschemas/postserviceinterface/16-07-2009/Post_ObtenerInfoRoomPorHabitacion";
            $option=array('trace'=>1);

            try {
                $soapClient = new SoapClient("https://api.palaceresorts.com/TigiServiceInterface/ServiceInterface.asmx?wsdl", $option);
                echo " _ hize la conexion con la api  ";
                $resultRequest = $soapClient->__doRequest($xml, $wsdlloc, $accion, 0);
                echo " si me dio un resultado  ";
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

        public function splitHalf($lastN){
            $half = (int) ( (strlen($lastN) / 2) );
            $lefthalf = substr($lastN, 0, $half);
            echo "Este es la mitad del apellido(split): " . $lefthalf;
            return $lefthalf;
        }

        public function getHalfDB($str)
        {
            $words = preg_replace('/[0-9]+/', '', $str);
            echo " Usuario sin la habitacion(getHalf):  " . $words . " ";
            $half = (int) ( (strlen($words) / 2) );
            $lefthalf = substr($str, 0, $half);

            echo "Usuario a la mitad(getHalf): " . $lefthalf . " ";

            return $lefthalf;            
        }
        

        public function chkzqadd($usuario, $usuario1, $password1, $sip, $mac, $client_mac, $uip, $ssid, $vlan)
        {   
            $lastname = mb_convert_encoding($password1, 'UTF-8');
            //$lastname = utf8_encode($password1);
            $lastname = $this->cleanString($password1);

            $lastname = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");

            $usuariojunto = $lastname . $usuario1;
            $usuariojunto = $this->cleanString($usuariojunto);
            //$usuariojunto = utf8_encode($usuariojunto);


            $stmt = "SELECT username FROM authtoken WHERE username = ?";
            
            $queryrad = $this->dbConxZQ->prepareQ($stmt);
            $queryrad->bindParam(1, $usuariojunto);
            $queryrad->execute();

            $row = $queryrad->fetch();
            $usuariorad = $row['username'];

            $halfApeDB = $this->getHalfDB($usuariorad);

            $fechain = date("Y-m-d H:i:s");
            //$fechaout = "2015-09-29";
            //$fechaout = $fechain->add(new DateInterval('P17D'));

            if ($lastname === $halfApeDB) {
                echo "  --Si existe ese usuario en la base ";
                //$this->loginZD($usuariojunto, $sip, $mac, $client_mac, $uip, $ssid, $vlan);
            }elseif ($usuariorad === $usuariojunto) {
                echo "  --Si existe ese usuario en la base ";
                //$this->loginZD($usuariojunto, $sip, $mac, $client_mac, $uip, $ssid, $vlan);
            }
            else
            {   
                echo " entre al else_para logear por XML";
                $XMLquery = $this->replaceXML($usuario1);
                $XMLresponse = $this->getInfoxHab($XMLquery);

                $XMLresponse = str_replace('xmlns=', 'ns=', $XMLresponse);
                $XMLsimple = simplexml_load_string($XMLresponse);

                foreach ($XMLsimple->xpath('//RmFolio') as $RmFolio) {
                    $ApeXML = $RmFolio->Rmfolio->last_name;
                    $NombreXML = $RmFolio->Rmfolio->first_name;
                    $nochesXML = $RmFolio->Rmfolio->nights;
                }
                
                //$ApeXML = mb_convert_encoding($ApeXML, 'UTF-8');
                $ApeXML = $this->cleanString($ApeXML);
                $ApeXML = mb_convert_case($ApeXML, MB_CASE_UPPER, "UTF-8");

                $NombreXML = $this->cleanString($NombreXML);
                $NombreXML = mb_convert_case($NombreXML, MB_CASE_UPPER, "UTF-8");       

                $nochesXML = $nochesXML +1;
                $noches = "+" . $nochesXML . " day";
                $fechaout = strtotime ( $noches , strtotime ( $fechain ) ) ;
                $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );

                $ApeXMLhalf = $this->splitHalf($ApeXML);

                if ($ApeXMLhalf === $lastname) {
                    echo " _si existe usuario(Ape a la mitad)";
                    // Modificar el usuario que se agrega a la base de datos.
                    $this->insertRad($usuariojunto, $NombreXML, $fechain, $fechaout);
                    usleep(5000);
                    //$this->loginZD($usuariojunto, $sip, $mac, $client_mac, $uip, $ssid, $vlan);
                }elseif ($ApeXML === $lastname){
                    echo " _si existe en el PMS ";
                    $this->insertRad($usuariojunto, $NombreXML, $fechain, $fechaout);
                    usleep(5000);
                    //$this->loginZD($usuariojunto, $sip, $mac, $client_mac, $uip, $ssid, $vlan);
                }else{
                    echo " _no existe en el PMS__?? raro  ";
                    //$this->loginZD($usuariojunto, $sip, $mac, $client_mac, $uip, $ssid, $vlan);
                }
            }
        }

        public function insertRad($user, $nom, $fecha1, $fecha2) {
            //echo "-- Entre al insercion - estamos cerca--  ";
            $atr1="Auth-Type";
            $atr2="Cleartext-Password";
            $atr3="Expiration";
            $op ="+=";
            $Tipo="Local";
            $passglobal = "123";
            $createby = "sitroot";
            //$fecha = "2015-07-18 00:00:00";
            //$exp = "2015-07-27 00:00:00";
            //$exp1 = "27 Jul 2015 00:00:00";
            $group = "default";

            //strtotime($fecha1);

            $fechainmod = $fecha1;

            $fechaoutauth = $fecha2;

            $fechamod = date ("d M Y H:i:s", strtotime($fecha2));
            $fechaoutmod = $fechamod;

            // $fechainmod = $fecha1 . " 23:59:59";

            // $fechaoutauth = $fecha2 . " 23:59:59";

            // $fechamod = date ("d M Y", strtotime($fecha2));
            // $fechaoutmod = $fechamod . " 23:59:59";


            $stmt = "INSERT INTO authtoken (username, name, password, createdate, createby, expiration) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt1 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr1', '$op', '$Tipo')";
            $stmt2 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr2', '$op', ?)";
            //$stmt3 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr3', '$op', ?)";
            //$stmt4 = "INSERT INTO usergroup (UserName, GroupName) VALUES (?, ?)";
            $this->dbConxZQ->beginTR();

            $queryinsert = $this->dbConxZQ->prepareQ($stmt);
            $queryinsert1 = $this->dbConxZQ->prepareQ($stmt1);
            $queryinsert2 = $this->dbConxZQ->prepareQ($stmt2);
            //$queryinsert3 = $this->dbConxZQ->prepareQ($stmt3);
            //$queryinsert4 = $this->dbConxZQ->prepareQ($stmt4);

            $queryinsert->bindParam(1, $user);
            $queryinsert->bindParam(2, $nom);
            $queryinsert->bindParam(3, $passglobal);
            $queryinsert->bindParam(4, $fechainmod);
            $queryinsert->bindParam(5, $createby);
            $queryinsert->bindParam(6, $fechaoutauth);
            $queryinsert->execute();

            $queryinsert1->bindParam(1, $user);
            $queryinsert1->execute();

            $queryinsert2->bindParam(1, $user);
            $queryinsert2->bindParam(2, $passglobal);
            $queryinsert2->execute();

            //$queryinsert3->bindParam(1, $user);
            //$queryinsert3->bindParam(1, $exp1);
            //$queryinsert3->execute();

            //$queryinsert4->bindParam(1, $user);
            //$queryinsert4->bindParam(1, $group);
            //$queryinsert4->execute();

            $this->insertRad1($user, $fechaoutmod);
            $this->insertGroup($user);
            $this->dbConxZQ->hacercommit();


            //$this->dbConxZQ->hacercommit();
        }

        public function loginZD($user, $sip, $mac, $client_mac, $uip, $ssid, $vlan) {
            $this->request->addParam("username", $user);
            $this->request->addParam("password", "123");
            $this->request->addParam("sip", $sip);
            $this->request->addParam("mac", $mac);
            $this->request->addParam("client_mac", $client_mac);
            $this->request->addParam("uip", $uip);
            $this->request->addParam("ssid", $ssid);
            $this->request->addParam("vlan", $vlan);
            $this->request->forward("http://172.20.0.2:9997/login");
        }

        public function insertRad1($user, $exp){
            // authtoken, radcheck, usergroup.
            $atr3="Expiration";
            $op ="+=";
            //$exp1 = "27 Jul 2015 00:00:00";


            $stmt2 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr3', '$op', ?)";
        
            $query1 = $this->dbConxZQ->prepareQ($stmt2);

            $query1->bindParam(1, $user);
            $query1->bindParam(2, $exp);
            $query1->execute();
        }

        public function insertGroup($user){
            $grupo ="default";

            $stmt4 = "INSERT INTO usergroup (UserName, GroupName) VALUES (?, ?)";

            $query3 = $this->dbConxZQ->prepareQ($stmt4);

            $query3->bindParam(1, $user);
            $query3->bindParam(2, $grupo);
            $query3->execute();
        }
    }

?>