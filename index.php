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
<<<<<<< HEAD
if (!empty($_GET['search'])) {
=======
if (!empty($_POST['reservar'])) {/*RESERVAR PRODUCTO*/
  //$nombre = $_GET['search'];
    //$sql    = "SELECT idProducto, Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto
  //WHERE Nombre LIKE '$nombre%' and reservado=0;";
    //$result = $conexion->query($sql);
  echo "Quiero pasar por aqui el nombre del producto, y asi mostrarlo en reservar.php"
  include("reservar.php");
}else{

if (!empty($_GET['search'])) {/*MOSTRAR PRODUCTO A BUSCAR*/
>>>>>>> parent of 45fd1dd... ; agregado
    $nombre = $_GET['search'];
    $sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto
  WHERE Nombre LIKE '$nombre%';";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else{
if (
  (!empty($_GET['categoria']=="Computacion")) ||
  (!empty($_GET['categoria']=="Consolas")) ||
  (!empty($_GET['categoria']=="Celulares")) ||
  (!empty($_GET['categoria']=="AudioVideo")) ||
  (!empty($_GET['categoria']=="Juegos")) ||
  (!empty($_GET['categoria']=="Televisores"))
) {  
  $categoria=$_GET['categoria'];
    $sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto
  WHERE categoria='$categoria'";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else {
    $sql    = "SELECT idProducto,Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}
}
?>
<footer>Todos los derechos reservados</footer>
</html> 