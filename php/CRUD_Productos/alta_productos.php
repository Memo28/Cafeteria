<?php
/*Este archivo nos servira para poder agregar los datos de un nuevo producto a la bd @producto,@cantidad,@precio,@t_producto,@foto son paramentros que viene de la pantalla anterior "Alta_Producto" a traves de un metodo POST, para el guardado de la imagen lo que se hace es agregarla a la carpeta de fotos que se encuentra en la raiz de los archivos, ahí es donde se almacenaran las fotos de los productos.
*/
	include ("../conexion.php");
	$producto = $_POST["producto"];
	$cantidad = $_POST["cantidad"];
	$precio = $_POST["precio"];
	$t_producto = $_POST["t_producto"];

	$foto=$_FILES["foto"]["name"];
	$ruta=$_FILES["foto"]["tmp_name"];
	$destino="../../fotos/".$foto;
	copy($ruta,$destino);

	$link = Conectarse();
	$t = time();
	$fecha=date("Y/m/d",$t);

	$query = "INSERT INTO producto (nombre, cantidad, fecha, tipo, precio, calificacion,imagen) VALUES ('$producto','$cantidad','$fecha','$t_producto','$precio','1','$foto')";	
	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Agregado Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Producto.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al agregar a la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Producto.html");
			</script>';
	}
?>
