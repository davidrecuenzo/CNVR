<?php

	echo "<h4>SERVIDOR 1</h4>";

	// Parámetros de conexión a la base de datos
	$dbhost = "10.1.2.17";
	$dbname = "cnvr";
	$dbuser = "s1";
	$dbpass = "xxxx";
	try{
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass,
			      	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $error){
		die("Error conexión BBDD " . $error->getMessage());
	}

	$sql = "SELECT id, nombre_server FROM servers";
	foreach ($db->query($sql) as $fila) {
		print "<br>";
		print $fila['id'] . "\t";
		print $fila['nombre_server'] . "\t";
	}
?>
