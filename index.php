<?php
error_reporting(E_ALL ^ E_NOTICE);
include("./db/configuracion.php");
include("encabezado.php");
include("categoria.php");

/*Conectar con el servidor*/
$conexion = new mysqli($servername, $username, $password, $dbname);
/*Revisar conexion*/
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
?>
<html><!-- Inicio HTML-->
<?php
if (!empty($_GET['search'])) {
    $nombre = $_GET['search'];
    $sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto
  WHERE Nombre LIKE '$nombre%';";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else {
    $sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}
?>
<footer>Todos los derechos reservados</footer>
</html> 