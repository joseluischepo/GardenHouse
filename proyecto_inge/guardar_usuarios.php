<?php
//Hace conexión con conexión.php
include("conex.php");
//Declara las variables nombre, apellido, correo
  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $correo= $_POST['correo'];
  $numero= $_POST['numero'];
  $contraseña1= $_POST['contraseña1'];
  $contraseña2= $_POST['contraseña2'];
  //$rol = 1; //usuario
//Inserta en la tabla "usuarios" el nombre, el apellido y el correo las variables declaradas anteriormente
  $query="INSERT INTO usuarios(nombre,apellido,correo,numero,contraseña1,contraseña2) VALUES('$nombre','$apellido','$correo','$numero','$contraseña1','$contraseña2')";
//Abre conexión
  $resultado= $conexion->query($query);
//Si hay conexión los datos se llevarán hacía la tabla
  if($resultado){
    header("Location: login.php");
    echo "Registro exitoso";
  }
  //Si no hay conexión aparecerá lo siguiente
  else{
    echo "Insercion no exitosa";
  }

?>