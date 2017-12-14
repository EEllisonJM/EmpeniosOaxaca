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
if ($_REQUEST['btnConfirmar'] =="Confirmar reserva") {/*CLIENTE CONFIRMA COMPRA*/  
  mysqli_query($conexion,"INSERT INTO cliente(nombre, telefono, codigo, aparta)
    VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["telefono"]."',123,'".$_REQUEST["producto"]."')");
  /*CREAR UN TRIGGER PARA QUE EL [codigo] SEA EL [idCliente]*/
    ?>
    <script>
      alert("Reservado Exitosamente.");
      
    </script>

      <?php
}
if (!empty($_POST['reservargetID'])) {/*RESERVAR PRODUCTO*/  
  $esteid = $_POST['reservargetID'];//Obtener id
  //echo  $esteid;
  include("reservar.php");
}else{

if (!empty($_GET['search'])) {/*MOSTRAR PRODUCTO A BUSCAR*/
    $nombre = $_GET['search'];
    $sql    = "SELECT idProducto, nombre, descripcion, marca, precio,rutaImagen,categoria FROM Producto
  WHERE nombre LIKE '$nombre%' and reservado=0;";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else{
if (/*SELECCIONAR CATEGORIA A MOSTRAR*/
  (!empty($_GET['categoria']=="Computacion")) ||
  (!empty($_GET['categoria']=="Consolas")) ||
  (!empty($_GET['categoria']=="Celulares")) ||
  (!empty($_GET['categoria']=="AudioVideo")) ||
  (!empty($_GET['categoria']=="Juegos")) ||
  (!empty($_GET['categoria']=="Televisores"))
) {  
  $categoria=$_GET['categoria'];
    $sql    = "SELECT idProducto, nombre, descripcion, marca, precio,rutaImagen,categoria FROM Producto
  WHERE categoria='$categoria' and reservado=0";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else {/*MOSTRAR PRODUCTOS*/
    $sql    = "SELECT idProducto, nombre, descripcion, marca, precio,rutaImagen,categoria FROM Producto WHERE reservado=0" ;
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}
}
}
?>
<footer>Todos los derechos reservados</footer>
</html> 