<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis

include("../configuraciondb.php");
include("menu.php");

if ($_SESSION["tipo"] == "ADMINISTRADOR" ||
	$_SESSION["tipo"] == "GERENTE" ||
	$_SESSION["tipo"] == "ENCARGADO DE PRODUCTOS" ||
	$_SESSION["tipo"] == "JEFE DE RECURSOS HUMANOS") {

?>

<html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Empeños Mexicanos</title>
	<link rel="stylesheet" href="estilo_admin.css">
</head>
</html>

<?php
} else {
?>

	<script>/*NO ACCESS MDF..*/
		alert("Acceso Denegado");
		window.location = "../ses/logueo.php";
	</script>


<?php
	}
?> 
