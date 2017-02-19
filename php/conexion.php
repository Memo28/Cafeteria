<?php
// datos para la conexion a mysql
$hostname = 'localhost';
$database = 'cafe_fcc';
$username = 'root';
$password = '';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
else{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$email = mysqli_real_escape_string($mysqli,$email);
	$pass = mysqli_real_escape_string($mysqli,$password);

	$query = "SELECT * FROM usuario WHERE email= '$email' AND password= '$password'";

	$run_user = mysqli_query($mysqli, $query);
	$check_user = mysqli_num_rows($run_user);

	if($check_user>0){
		$_SESSION[‘email’]=$email;
		echo header("Location:../Principal.html");
	}else{
		echo "<script>alert('¡Email o Contraseña incorrecta!')</script>";
		echo "<script>location.href='../index.html'</script>";
	}
}
?>