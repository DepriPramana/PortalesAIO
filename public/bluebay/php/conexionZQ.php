<?php

class DBZQ
    {
		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new DBZQ();
			}
			return self::$instance;
		}

		private function __construct(){
	            $this->Conectar();
		}

		public function Conectar(){
				//host orbis ip: 189.149.227.61
				//$this->dbcon=new PDO('mysql:host=7.7.7.1; dbname=radius','admin','W1f1s1t');
				//echo "  Something went wrong with the connection, please try again later. ZQ.  ";
				$this->dbcon=new PDO('mysql:host=187.130.75.3; port=3306; dbname=radius', 'admin', 'W1f1s1t');
				//$this->dbcon=new PDO("mysql:host=200.34.66.201; dbname=radius", "sitroot", "W1f1s1t", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	            //$this ->dbcon>exec("set character set utf8");
	            if(!$this->dbcon){
	            	echo "  Something went wrong with the connection, please try again later. ZQ.  ";
	                $this->die("Conexion fail");
		    	}else {
		    	echo "  ** Connected ** ";
		    	}
	    }
	        
		public function prepareQ($stmt){
	            return $this->dbcon->prepare($stmt);
		}

		public function beginTR(){
	            $this->dbcon->beginTransaction();
	    }
	        
	    public function hacercommit(){
	            $this->dbcon->commit();
	    }
        
    }

?>