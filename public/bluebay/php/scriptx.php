<?php
	set_include_path(implode(PATH_SEPARATOR, array( 
        realpath(dirname(__FILE__) . '/phpseclib'), 
        get_include_path(), 
	)));

	//include_once("conexionZQ.php");
	include_once("conexionSFTP.php");

	// $atr1="Auth-Type";
	// $atr2="Cleartext-Password";
	// $atr3="Expiration";
	// $op ="+=";
	// $Tipo="Local";
	// $passglobal = "123";
 	// $createby = "sitroot";

	//$dbConxZQ = DBZQ::getInstance();

	// $fechain = date("Y-m-d");
	// $fechaout = strtotime ( '+14 day' , strtotime ( $fechain ) ) ;
	// $fechaout = date ( 'Y-m-d' , $fechaout );
	// $fechainmod = $fechain . " 23:59:59";
	// $fechaoutauth = $fechaout . " 23:59:59";
	// $fechamod = date ("d M Y", strtotime($fechaout));
	// $fechaoutmod = $fechamod . " 23:59:59";
	// $group = "default";

	//$usuario="sitwifi";
	//$password="V-ZNP5iaM_CTxXp";
	$usuario="sitwifijm";
	$password="uCu-xWpDZ5ypKKw";

	$raiz="/out/";
	//$raiz="/var/www/html/";
	$targetFile="/out/reservas_inhouse_zcjg.txt";
	//$targetFile="/out/reservas_inhouse_zrpl.txt";
	
	$conexion= new conexionSFTP("mobile.palaceresorts.com",22,$usuario,$password);
	//echo "   aqui ya no ::? porfavor??  ";
	    $conexion->conectar();


	    $filasarray = array();
	    $filasarray = $conexion->get_contents_array($targetFile);
	    
	    $rows = count($filasarray);

	    //for ($row = 0; $row < $rows; $row++){
	    //	echo "Apellido: " . $filasarray[$row] . " Nombre: " . $filasarray[$row] . " habitacion: " . $filasarray[$row];
	    //}
	    //$i=0;
	    foreach($filasarray as $key => $value){
	    	//list($apellido, $nombre, $habitacion) = explode(",", $value);
	    	$filasarray[$key] = str_getcsv($value);
	    	//echo "  Apellido: " . $apellido . "  Nombre: " . $nombre . " habitacion:  ". $habitacion;

	    	//$user = $apellido . $habitacion;

	    	$stmt = "INSERT INTO authtoken (username, name, password, createdate, createby, expiration) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt1 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr1', '$op', '$Tipo')";
            $stmt2 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr2', '$op', ?)";
            $stmt3 = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES (?, '$atr3', '$op', ?)";
            $stmt4 = "INSERT INTO usergroup (UserName, GroupName) VALUES (?, ?)";

            //$this->dbConxZQ->beginTR();

            //$queryinsert = $this->dbConxZQ->prepareQ($stmt);
            //$queryinsert1 = $this->dbConxZQ->prepareQ($stmt1);
            //$queryinsert2 = $this->dbConxZQ->prepareQ($stmt2);
            //$queryinsert3 = $this->dbConxZQ->prepareQ($stmt3);
            //$queryinsert4 = $this->dbConxZQ->prepareQ($stmt4);

            //$queryinsert->bindParam(1, $user);
            //$queryinsert->bindParam(2, $nombre);
            //$queryinsert->bindParam(3, $passglobal);
            //$queryinsert->bindParam(4, $fechainmod);
            //$queryinsert->bindParam(5, $createby);
            //$queryinsert->bindParam(6, $fechaoutauth);
            //$queryinsert->execute();

            //$queryinsert1->bindParam(1, $user);
            //$queryinsert1->execute();

            //$queryinsert2->bindParam(1, $user);
            //$queryinsert2->bindParam(2, $passglobal);
            //$queryinsert2->execute();

            //$queryinsert3->bindParam(1, $user);
            //$queryinsert3->bindParam(1, $fechaoutmod);
            //$queryinsert3->execute();

            //$queryinsert4->bindParam(1, $user);
            //$queryinsert4->bindParam(1, $group);
            //$queryinsert4->execute();
            //$i++;
          	//if($i==97) break;

	    }

	    for ($row = 1; $row < $rows; $row++) {
	    	echo " Apellido: " . $filasarray[$row][0] . " Nombre: " . $filasarray[$row][1] . " Habitacion: " . $filasarray[$row][2] . " Fecha X: " . $filasarray[$row][3] . " Fecha X2: " . $filasarray[$row][4];
	    }
	    //$this->dbConxZQ->hacercommit();
    		
	    //print_r($filasarray);
	    //echo " Este es el numero de filas:  " . $rows;
		
	
//Servidor: mobile.palaceresorts.com
//Usuario:  sitwifi
//Password: V-ZNP5iaM_CTxXp
//Archivo: /out/reservas_inhouse_lbc.txt

?>

