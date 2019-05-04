<?php

class validation
{

	private $user;
	private $email;
	
	function __construct()
	{
		$this->general();
	}

	public function getEmail()
	{
		return $this->email = $_POST['email'];
	}
	
	public function general()
	{	
		//$correo = "jesquinca@hola.com";
		$correo = $this->getEmail();
		$domain = explode('@', $correo);

		if (checkdnsrr($domain[1])){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}
}

$val = new validation();

?>