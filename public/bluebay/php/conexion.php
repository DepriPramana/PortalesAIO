<?php
////$serv = "192.168.242.1";
////$user = "admin";
////$pass = "root";
////$db = "radius";
//$serv = "localhost";
//$user = "root";
//$pass = "";
//$db = "simulacion";
//
//$con = mysqli_connect($serv,$user,$pass)or die("problemas al conectar");
//mysqli_select_db($con, $db)or die ("problemas al seleccionar la Base de Datos");
class DB 
    {	
	public static $instance;

	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new DB();
		}
		return self::$instance;
	}

	private function __construct(){
            $this->Conectar();
            /**$this->_mysqli = new mysqli('localhost', 'root', "", 'proyectoyek');
            if($this->_mysqli->connect_error){
            die($this->_mysqli->connect_error);
            }**/
	}

	public function Conectar(){
            $this ->dbcon=new PDO('mysql:host=208.138.34.51; dbname=radius','admin','W1f1s1t');
            /**$this ->dbcon>exec("set character set utf8");**/
            if(!$this->dbcon){
                $this->die("Conexion fail");
	    }else {
	    
	     }
        }
        
	public function prepareQ($stmt){
            return $this->dbcon->prepare($stmt);
	}
        
    }
?>
