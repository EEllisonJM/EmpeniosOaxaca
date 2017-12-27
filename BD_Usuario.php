<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require("db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

$result = mysqli_query($conexion, "SELECT * FROM Usuario");
$outp = "";
while ($rs = mysqli_fetch_array($result)) {
	if ($outp != "") {
		$outp .= ",";
	}
	$outp .= '{"nombre":"' . $rs["userName"] . '",';
    $outp .= '"visible":"' . $rs["visible"] . '",';
    $outp .= '"id":"' . $rs["idUsuario"] . '"}';
}

$outp = '{"datos":[' . $outp . ']}';
	echo ($outp);
?>
