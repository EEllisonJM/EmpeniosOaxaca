<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include("./db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

$result = mysqli_query($conexion,"SELECT * FROM producto");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
    if($outp != "") 
    {
    	$outp .= ",";
    }
    $outp .= '{"idProducto":"'  . $rs["idProducto"] . '",';
    $outp .= '"Descripcion":"'   . $rs["descripcion"]        . '",';
    $outp .= '"Marca":"'. $rs["marca"]     . '"}';
}
$outp ='{"datos":['.$outp.']}';

echo($outp);
?>