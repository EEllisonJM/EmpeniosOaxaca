<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require("db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

$result = mysqli_query($conexion,"SELECT * FROM producto");
$outp = "";
while ($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"idProducto":"'  . $rs["idProducto"] . '",';
    $outp .= '"nombre":"'   . $rs["nombre"]        . '",';
    $outp .= '"descripcion":"'. $rs["descripcion"]     . '",' ;
    $outp .= '"marca":"'. $rs["marca"]     . '",' ;
    $outp .= '"modelo":"'. $rs["modelo"]     . '",' ;
    $outp .= '"reservado":"'. $rs["reservado"]     . '"}';
}

$outp ='{"datos":['.$outp.']}';
    echo($outp);
?>
