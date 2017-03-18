<?php
/*Este archivo nos servira para poder agregar los datos de una nueva promocion a la bd @promocion,@precio,@vigencia,@condiciones,@foto son paramentros que viene de la pantalla anterior "Alta_Producto" a traves de un metodo POST, para el guardado de la imagen lo que se hace es agregarla a la carpeta de fotos que se encuentra en la raiz de los archivos, ahí es donde se almacenaran las fotos de los productos.
*/
	include ("../conexion.php");
	$promocion = $_POST["promocion"];
	$precio = $_POST["precio"];
	$vigencia = $_POST["vigencia"];
	$condiciones = $_POST["condiciones"];

	$foto=$_FILES["foto"]["name"];
	$ruta=$_FILES["foto"]["tmp_name"];
	$destino="../../fotos/".$foto;
	copy($ruta,$destino);
	$link = Conectarse();

	$query = "INSERT INTO promociones (promocion,precio,vigencia,condiciones,imagen) VALUES ('$promocion','$precio','$vigencia','$condiciones','$foto')";

	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Agregado Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Promocion.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al agregar a la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Promocion.html");
			</script>';
	}
?>