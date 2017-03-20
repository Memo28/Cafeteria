<?php
/*En este archivo se reciben los datos de la ventana modal la variable "$producto_actual" nos sirve en caso de que lo que se vaya a modificar sea el nombre, entonces se crea una variable auxiliar para realizar la funcion. 
Una vez obtenidos los datos se procede a realizar la query para modificar los valores que se agregaron y se conecta a la BD
*/
	include ("../conexion.php");
	$productos = $_POST["producto"];
	$producto_actual = $_POST["productos_actual"];
	$precio = $_POST["precio"];

	echo $producto_actual;
	echo $precio;
	$link = Conectarse();
	$query ="UPDATE paquetes SET productos= '$productos',precio='$precio' WHERE paquetes.productos = '$producto_actual'";
	$result=mysqli_query($link,$query);

	if($result){
			echo '<script type="text/javascript">
			alert("Valores Modificados Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Paquetes.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al modificar en la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Paquetes.html");
			</script>';
	}
?>