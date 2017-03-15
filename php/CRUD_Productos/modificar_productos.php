<?php
/*En este archivo se reciben los datos de la ventana modal la variable "$producto_actual" nos sirve en caso de que lo que se vaya a modificar sea el nombre, entonces se crea una variable auxiliar para realizar la funcion. 
Una vez obtenidos los datos se procede a realizar la query y se conecta a la BD
*/
	include ("../conexion.php");
	$producto = $_POST["producto"];
	$producto_actual = $_POST["producto_actual"];
	$cantidad = $_POST["cantidad"];
	$precio = $_POST["precio"];
	$t_producto = $_POST["t_producto"];

	$link = Conectarse();
	$t = time();
	$fecha=date("Y/m/d",$t);

	$query ="UPDATE producto SET precio = '$precio', cantidad = '$cantidad', tipo = '$t_producto',fecha='$fecha',nombre = '$producto'  WHERE producto.nombre = '$producto_actual'";
	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Valores Modificados Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Producto.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al modificar en la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Producto.html");
			</script>';
	}
?>