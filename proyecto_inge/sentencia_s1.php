<?php
//conexion a la base de datos
$dbhost = "localhost";  //host local
$dbuser = "root";		//usuario de BD
$dbpass = "";	//contraseña de BD
$dbname = "garden_house";	//nombre de la BD

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
                
$temperatura = mysqli_query($con, "SELECT nodo.humedad_t, nodo.Fecha FROM garden_house.nodo WHERE nodo.idu");

?>

