<?php 

require_once("conexionZQ.php");
//require_once("conexion.php");
require_once("Request.php");

class sistema 
{
	private $wificode;
	private $apellido;
    private $nombre;
	private $email;
	private $sip;
	private $mac;
	private $client_mac;
	private $uip;
	private $ssid;
	private $vlan;

    public $dbConxZQ;
    //public $dbConx;
    public $request;
    private $stmt;

	function __construct()
	{
	    $this->dbConxZQ = DBZQ::getInstance();
	    //$this->dbConx = DB::getInstance();
	    $this->request = new Request();
	    $this->chkzqadd();
	}


    public function getWificode(){
        return $this->username = $_POST['wificode'];
    }

	public function getApellido(){
		return $this->password1 = $_POST['apellido'];
	}

	public function getNombre()
	{
		return $this->password2 = $_POST['nombre'];
	}

	public function getEmail()
	{
		return $this->email = $_POST['email'];
	}

	public function getSip() { 
		return $this->sip = $_POST['sip']; 
	}

	public function getMac() { 
		$this->mac = $_POST['mac']; 
	}

	public function getClient_mac() { 
		return $this->client_mac = $_POST['client_mac']; 
	}

	public function getUip() { 
		return $this->uip = $_POST['uip']; 
	}

	public function getSsid() { 
		return $this->ssid = $_POST['ssid']; 
	}

	public function getVlan() { 
		return $this->vlan = $_POST['vlan']; 
	}

    public function cleanString($str){
        $str = str_replace("Ñ" ,"N", $str);
        $str = str_replace("ñ" ,"n", $str);
        return $str;
    }


    public function chkzqadd(){   
        $lastname = mb_convert_encoding($this->getApellido(), "UTF-8");
        //$lastname = utf8_encode($password1);
        $lastname = $this->cleanString($this->getApellido());
        $lastname = mb_convert_case($lastname, MB_CASE_UPPER, "UTF-8");
        echo "Lastname recibo de pagina:" . $lastname;
        $firstN = mb_convert_encoding($this->getNombre(), "UTF-8");
        $firstN = $this->cleanString($this->getNombre());
        $firstN = mb_convert_case($firstN, MB_CASE_UPPER, "UTF-8");
        echo "Nombre recibido de pagina:" . $firstN;

        $wificode = $this->getWificode();

        $stmt = "SELECT username FROM authtoken WHERE username = ?";
        
        $queryrad = $this->dbConxZQ->prepareQ($stmt);
        $queryrad->bindParam(1, $wificode);
        $queryrad->execute();

        $row = $queryrad->fetch();
        $usuariorad = $row['username'];

        $fechain = date("Y-m-d H:i:s");

        if ($usuariorad === $wificode){
            echo "  --Si existe ese usuario en la base ";
            echo "usuario rad: " . $usuariorad . "usuario base: " . $wificode;
            if ($this->checarEXP($usuariorad)) {
                
                $this->loginZD($usuariorad);
            }else{
                $this->checkProfile($usuariorad, $fechain);
                $this->insertData($firstN, $lastname, $this->getEmail(), $wificode);
                
                $this->loginZD($usuariorad);
            }
        }
        else
        {       
            echo " _no existe  ";
            $this->loginZD($usuariojunto);
        }
    }

    public function insertData($name, $lastname, $email, $code){
        $stmt = "INSERT INTO datosbluebay (firstname, lastname, email, wificode) VALUES (?, ?, ?, ?)";

        $queryrad = $this->dbConxZQ->prepareQ($stmt);
        $queryrad->bindParam(1, $name);
        $queryrad->bindParam(2, $lastname);
        $queryrad->bindParam(3, $email);
        $queryrad->bindParam(4, $code);
        $queryrad->execute();
    }
    
    public function checarEXP($user){
        $atr3="Expiration";

        $stmt = "SELECT count(Attribute) Attribute FROM radcheck WHERE UserName = ?";
        
        $queryrad = $this->dbConxZQ->prepareQ($stmt);
        $queryrad->bindParam(1, $user);
        $queryrad->execute();

        $row = $queryrad->fetch();

        $atributo = $row['Attribute'];

        if ($atributo > 2) {
            return TRUE;
        }
        return FALSE;
    }

    public function updateAuth($user, $fecha){
        $stmt = "UPDATE authtoken SET expiration = ? WHERE username = ?";
        $query1 = $this->dbConxZQ->prepareQ($stmt);
        $query1->bindParam(1, $fecha);
        $query1->bindParam(2, $user);
        $query1->execute();       
    }
    public function insertRadChk($user, $fecha){   
        $atr3="Expiration";
        $op ="+=";

        $fechaout = date ("d M Y H:i:s", strtotime($fecha));

        $stmt = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr3', '$op', ?)";

        $query1 = $this->dbConxZQ->prepareQ($stmt);
        $query1->bindParam(1, $user);
        $query1->bindParam(2, $fechaout);
        $query1->execute(); 
    }

    public function checkProfile($user, $fecha){

        $stmt = "SELECT profile FROM authtoken WHERE username = ?";

        $query = $this->dbConxZQ->prepareQ($stmt);
        $query->bindParam(1, $user);
        $query->execute();
        $row = $query->fetch();

        $profile = $row['profile'];

        switch ($profile) {
            case 'bbay-1dia':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-3dias':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-7dias':
                $this->loginZD('MALCODIGO');
                break;
            case 'circleone':
                $this->loginZD('MALCODIGO');
                break;
            case 'bbay-free':
                $fechaout = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
                $fechaout = date ( 'Y-m-d H:i:s' , $fechaout );
                $this->updateAuth($user, $fechaout);
                $this->insertRadChk($user, $fechaout);
                break;

        }
    }

    public function insertRad($user, $nom, $fecha1, $fecha2){
        //echo "-- Entre al insercion - estamos cerca--  ";
        $atr1="Auth-Type";
        $atr2="Cleartext-Password";
        $atr3="Expiration";
        $op ="+=";
        $Tipo="Local";
        $passglobal = "123";
        $createby = "sitroot";
        $grupo = "temporal";

        $fechainmod = $fecha1;

        $fechaoutauth = $fecha2;

        $fechamod = date ("d M Y H:i:s", strtotime($fecha2));
        $fechaoutmod = $fechamod;


        $stmt = "INSERT INTO authtoken (username, name, password, profile, createdate, createby, expiration) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt1 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr1', '$op', '$Tipo')";
        $stmt2 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr2', '$op', ?)";
        $this->dbConxZQ->beginTR();

        $queryinsert = $this->dbConxZQ->prepareQ($stmt);
        $queryinsert1 = $this->dbConxZQ->prepareQ($stmt1);
        $queryinsert2 = $this->dbConxZQ->prepareQ($stmt2);

        $queryinsert->bindParam(1, $user);
        $queryinsert->bindParam(2, $nom);
        $queryinsert->bindParam(3, $passglobal);
        $queryinsert->bindParam(4, $grupo);
        $queryinsert->bindParam(5, $fechainmod);
        $queryinsert->bindParam(6, $createby);
        $queryinsert->bindParam(7, $fechaoutauth);
        $queryinsert->execute();

        $queryinsert1->bindParam(1, $user);
        $queryinsert1->execute();

        $queryinsert2->bindParam(1, $user);
        $queryinsert2->bindParam(2, $passglobal);
        $queryinsert2->execute();

        $this->insertRad1($user, $fechaoutmod);
        $this->insertGroup($user);
        $this->dbConxZQ->hacercommit();

    }

    public function loginZD($user){
        $this->request->addParam("username", $user);
        $ip = (string) $this->getSip();
        $zd = 'http://' . $ip . ':9997/login';
        
        $this->request->addParam("password", "123");
        $this->request->addParam("sip", $this->getSip());
        $this->request->addParam("mac", $this->getMac());
        $this->request->addParam("client_mac", $this->getClient_mac());
        $this->request->addParam("uip", $this->getUip());
        $this->request->addParam("ssid", $this->getSsid());
        $this->request->addParam("vlan", $this->getVlan());
        $this->request->forward($zd);
        //$this->request->forward("http://172.19.0.2:9997/login");
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
        $grupo2 ="temporal";

        $stmt4 = "INSERT INTO usergroup (UserName, GroupName) VALUES (?, ?)";

        $query3 = $this->dbConxZQ->prepareQ($stmt4);

        $query3->bindParam(1, $user);
        $query3->bindParam(2, $grupo2);
        $query3->execute();
    }

}

$sis = new sistema();

?>