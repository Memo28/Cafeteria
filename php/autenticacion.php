<?php
	include ("/conexion.php");
	$email = $_POST["email"];
	$password = $_POST["password"];

	//Coneccion y consulta a la BD
	$link = Conectarse();
	$email = mysqli_real_escape_string($link,$email);
	$pass = mysqli_real_escape_string($link,$password);
	$query = "SELECT * FROM usuarios WHERE correo= '$email' AND password= '$password'";
	$run_user = mysqli_query($link, $query);
	$check_user = mysqli_num_rows($run_user);

	//Verificacion de Usuario

	if($check_user>0){
		while ($row=mysqli_fetch_row($run_user)) {
			$tipo = $row[3];
		}
	}
	// Tipo 0 son Administradores
	//Tipo 1 son Empleados
	if ($tipo == 0) {
		$_SESSION[‘email’]=$email;
		echo header("Location:../Principal_Administrador.html");
	}else{
		$_SESSION[‘email’]=$email;
		echo header("Location:../Principal_Empleado#php/tables_datatables.html");
	}

?>
