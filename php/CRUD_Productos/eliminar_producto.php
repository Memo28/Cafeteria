
<?php
/*En este archivo se recibe a traves de un POST el producto que se desa eliminar y se guarda en la variable "$producto" una vez obtenida la variable se procede a hacer la peticion a la BD con la query delete y se analiza si se realizo correctamente se le avisa que fue correcto y se redirecciona a la pagina de modificar, en caso contrario se le notifica el error y se regresa a la pagina de "Modificar_Producto.html"
*/
	include ("../conexion.php");
	$producto = $_POST["producto"];
	$link = Conectarse();

	$query ="DELETE FROM producto WHERE producto.nombre = '$producto'";
	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Producto Eliminado Correctamente");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Producto.html");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al eliminar de la  Base de Datos");
			window.location.assign("../../Principal_Administrador.html?product=#Pantallas/Modificar_Producto.html");
			</script>';
	}
?>