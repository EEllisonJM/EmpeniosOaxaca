<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");

require("./db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);
$data = json_decode(file_get_contents("php://input"));/*Contenido a mostrar en formato [json]*/

mysqli_query($conexion, "UPDATE Usuario set visible = 0 WHERE idUsuario=$data->id");
//echo "Usuario eliminado exitosamente";
?>
