<?php
/*En este archivo se reciben los datos de la ventana modal la variable "$producto_actual" nos sirve en caso de que lo que se vaya a modificar sea el nombre, entonces se crea una variable auxiliar para realizar la funcion. 
Una vez obtenidos los datos se procede a realizar la query y se conecta a la BD
*/
	include ("../conexion.php");
	$promocion = $_POST["promocion"];
	$promocion_aux = $_POST["promocion_aux"];
	$precio = $_POST["precio"];
	$vigencia = $_POST["vigencia"];
	$condiciones = $_POST["condiciones"];

	$link = Conectarse();

	$query ="UPDATE promociones SET precio = '$precio', vigencia = '$vigencia', condiciones = '$condiciones',promocion = '$promocion'  WHERE promociones.promocion = '$promocion_aux'";
	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Valores Modificados Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Promocion.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al modificar en la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Promocion.html");
			</script>';
	}
?>