<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");

require("db/configuracion.php");
/*Conectar con el servidor*/
$conexion = new mysqli($servername, $username, $password, $dbname);
/*Pasar contenido como variable*/
$data = json_decode(file_get_contents("php://input"));
mysqli_query($conexion, "UPDATE Producto set reservado = 0 WHERE idProducto=$data->idProducto");
//echo "Producto eliminado satisfactoriamente";
?>
