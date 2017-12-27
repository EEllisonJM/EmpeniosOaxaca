<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("db/configuracion.php");
/*Conectar con el servidor*/
$conexion = new mysqli($servername, $username, $password, $dbname);
// pasa el contenido de mostrar_area
$data = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idProducto = mysqli_real_escape_string($conexion, $data->idProducto);
$nombre = mysqli_real_escape_string($conexion, $data->nombre);
$descripcion = mysqli_real_escape_string($conexion, $data->descripcion);
$marca = mysqli_real_escape_string($conexion, $data->marca);
$modelo = mysqli_real_escape_string($conexion, $data->modelo);
$reservado = mysqli_real_escape_string($conexion, $data->reservado);
// mysqli query para actualizar datos
$query = "UPDATE Producto SET nombre='$nombre',descripcion='$descripcion', marca='$marca', modelo='$modelo', reservado='$reservado'
	WHERE idProducto=$idProducto";
mysqli_query($conexion, $query);
	//echo "Actualizacion correcta";
?>
