<?php
	require_once("procesos.php");

	class usuario
	{
		public $db;

		private $username1;
		private $password1;
		private $password2;
		private $username;
		private $sip;
		private $mac;
		private $client_mac;
		private $uip;
		private $ssid;
		private $vlan;

		function __construct()
		{
			$this->db = new procesos();
			$this->acciones();	
		}

		public function acciones(){
			$this->getAct();
			//ob_start();
			switch ($this->accion) {
				case 'validarZQ':
					//echo "hmm case -- ??  ";
					$this->checkLoginZQ();
					break;
				case 'JODER':
					$this->funcionamierda();
					break;
				case 'inserPago':

					break;
				case'admin_Pago':

				default:
					# code...
					break;
			}

		}

		public function getAct (){
		   return $this->accion = $_POST['accion'];
   		}

   		//Tabla Cliente!!!

		public function getUsername1(){
			return $this->username1 = $_POST['username1'];
		}

		public function setUsername1($username1){
			$this->username1 = $username1;
		}

		public function getPassword1(){
			//$this->password1 = utf8_decode($this->password1);
			return $this->password1 = $_POST['password1'];
		}

		public function getPassword2()
		{
			return $this->password2 = $_POST['password2'];
		}
		
		public function setPassword2($password2)
		{
			$this->password2 = $password2;
		}
		

		public function setApepat1($Password1){
			$this->password1 = $password1;
		}

		public function getUsername(){
			return $this->username = $_POST['username'];
		}

		public function setUsername($username){
			$this->username = $username;
		}

		public function setSip($sip) { 
			$this->sip = $sip; 

		}
		public function getSip() { 
			return $this->sip = $_POST['sip']; 
		}
		public function setMac($mac) { 
			$this->mac = $mac; 

		}
		public function getMac() { 
			$this->mac = $_POST['mac']; 
		}

		public function setClient_mac($client_mac) { 
			$this->client_mac = $client_mac; 
		}

		public function getClient_mac() { 
			return $this->client_mac = $_POST['client_mac']; 
		}

		public function setUip($uip) { 
			$this->uip = $uip; 
		}

		public function getUip() { 
			return $this->uip = $_POST['uip']; 
		}

		public function setSsid($ssid) { 
			$this->ssid = $ssid; 
		}

		public function getSsid() { 
			return $this->ssid = $_POST['ssid']; 
		}

		public function setVlan($vlan) { 
			$this->vlan = $vlan; 
		}

		public function getVlan() { 
			return $this->vlan = $_POST['vlan']; 
		}

		// FUNCIONES DE DB

		public function checkLoginZQ(){
			//echo "entro pero a la funcion  -- ";
			$this->db->chkzqadd($this->getUsername(), $this->getUsername1(), $this->getPassword1(), $this->getPassword2(), $this->getSip(), $this->getMac(), $this->getClient_mac(), $this->getUip(), $this->getSsid(), $this->getVlan());
		}

		public function checkLoginPRO(){
			//echo "que pex --";
			$this->db->checarProcedure($this->getUsername(), $this->getUsername1(), $this->getPassword1(), $this->getSip(), $this->getMac(), $this->getClient_mac(), $this->getUip(), $this->getSsid(), $this->getVlan());
			
		}

		public function funcionamierda(){
			//echo "funcionaa CARAHLOOO";
		}

	}
	//echo "HOLA  ";
	$us = new usuario();

?>