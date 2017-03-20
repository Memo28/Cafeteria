<?php
/*Este archivo nos servira para poder agregar los datos de un nuevo paquete a la bd @precio y @lista_productos son paramentros que viene de la pantalla anterior "Alta_Paquetes" a traves de un metodo POST, para el guardado de la imagen lo que se hace es agregarla a la carpeta de fotos que se encuentra en la raiz de los archivos, ahí es donde se almacenaran las fotos de los productos.

La variable @lista_productos tiene un objeto json que necesitamos analizar para poder sacar la informacion necesaria de los productos, es por eso que la recorremos con el for y luego vamos concatenando en la variable @final que es la que se agregara a la BD
*/
	include ("../conexion.php");
	$precio = $_POST["precio"];
	$lista_productos = $_POST['lista_productos'];

	$obj_json = json_decode($lista_productos);
	$final = "";
	for($i=0;$i<count($obj_json);$i++){ 
	    $producto = $obj_json[$i]->value;
	    $final = $final." ".$producto;
	}

	echo $final;


	if($foto=$_FILES["foto"]["name"]){
		$ruta=$_FILES["foto"]["tmp_name"];
		$destino="../../fotos/".$foto;
		copy($ruta,$destino);
	}
	$link = Conectarse();

	$query = "INSERT INTO paquetes(productos,precio,calificacion,imagen) VALUES ('$final','$precio','1','$foto')";

	$result=mysqli_query($link,$query);
	echo mysqli_error($link);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Agregado Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Paquetes.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al agregar a la Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Alta_Paquetes.html");
			</script>';
	}
?>