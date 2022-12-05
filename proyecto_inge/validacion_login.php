<?php
include('conexion.php');
$correo=$_POST['correo'];
$contraseña2=$_POST['contraseña2'];
session_start();
$_SESSION['usuarios']=$correo;

if($_POST['correo'] == "admin@gardenhouse.com" && $_POST['contraseña2'] == "admin"){
  header("location:administrador_garden_house/administrador_garden_house/usuarios.php");
}else{
  $conexion=mysqli_connect("localhost","root","","garden_house");

  $consulta="SELECT*FROM usuarios where correo='$correo'";
  $resultado=mysqli_query($conexion,$consulta);
  $filas=mysqli_fetch_assoc($resultado);
  
  if($resultado && $filas['contraseña2'] == $contraseña2){
      header("location:usuario_garden_house/usuario_garden_house/dispositivos.php");
  }else{
    header("location:login.php");
  }
}
mysqli_free_result($resultado);
mysqli_close($conexion);
