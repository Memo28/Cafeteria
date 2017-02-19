<?php
// datos para la conexion a mysql
$conexion = mysqli_connect(“localhost”,”root”,””,”users”);

if (mysqli_connect_errno())
{

echo “MySQLi Connection was not established: ” . mysqli_connect_error();

}
?>