<?php
function Conectarse(){
	// datos para la conexion a mysql
	$hostname = 'mysql.hostinger.mx';
	$database = 'u144772454_cafe';
	$username = 'u144772454_root';
	$password = 'memovdg';	
	$mysqli = new mysqli($hostname, $username,$password, $database);
	if ($mysqli -> connect_errno) {
	die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
	. ") " . $mysqli -> mysqli_connect_error());
	exit();
	}
	return $mysqli;
}
?>