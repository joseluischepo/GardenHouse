<?php



//conexion a la base de datos
$dbhost = "localhost";  //host local
$dbuser = "root";		//usuario de BD
$dbpass = "";	//contraseña de BD
$dbname = "garden_house";	//nombre de la BD



$mysql = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$mysql) {
    die("Conexión fallida: " . mysqli_connect_error());
}

header('Content-Type: application/json; charset=utf-8');

$luz = $_GET['luz'];
$humedad_t = $_GET['humedad_t'];
$humedad_am = $_GET['humedad_am'];
$nivel_a = $_GET['nivel_a'];
$tipo_h = $_GET['tipo_h'];
$idu = $_GET['idu'];
$apikey = $_GET['apikey'];


date_default_timezone_set('America/Mexico_City');
$datetime=date('y-m-d H:i:s');

$query = "INSERT INTO nodo (luz, humedad_t, humedad_am, nivel_a, Fecha, tipo_h, idu, apikey) VALUES ('$luz', '$humedad_t', '$humedad_am', '$nivel_a', '$datetime', '$tipo_h', '$idu', '$apikey')";

$result = mysqli_query( $mysql, $query);

if($result){
    $json = json_encode("Datos cargados");
    echo $json;
}else{
    $json = json_encode("Datos No Cargados");
    echo $json;
}
    //proyecto_inge/api/carga.php?luz=1&humedad_t=1&humedad_am=1&nivel_a=1&tipo_h=Lechuga&idu=1&apikey=OLLBCAGONPPNAHL

    //cripiot.ml/GardenHouse/proyecto_inge/api/carga.php?luz=1&humedad_t=1&humedad_am=1&nivel_a=1&tipo_h=Lechuga&idu=29&apikey=ESCISLOKQFCIMENHJHBE
?>