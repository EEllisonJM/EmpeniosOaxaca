<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require("db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

$result = mysqli_query($conexion,"SELECT * FROM producto WHERE reservado=0");
$outp = "";
while($rs = mysqli_fetch_array($result)) {
	if($outp != "") {
		$outp .= ",";
    }
    $outp .= '{"idProducto":"'  . $rs["idProducto"] . '",';
    $outp .= '"nombre":"'   . $rs["nombre"]        . '",';
    $outp .= '"marca":"'. $rs["marca"]     . '"}';
}
$outp ='{"datos":['.$outp.']}';
	echo($outp);
?>