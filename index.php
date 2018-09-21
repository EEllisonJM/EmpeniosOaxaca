<?php
error_reporting(E_ALL ^ E_NOTICE);

include("db/configuracion.php");
include("encabezado.html");
include("categoria.html");

/*Conectar con el servidor*/
$conexion = new mysqli($servername, $username, $password, $dbname);
/*Revisar conexion*/
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
?>

<html><!-- Inicio HTML-->

<?php
if ($_REQUEST['btnConfirmar'] =="Confirmar reserva" ) {/*CLIENTE CONFIRMA COMPRA*/    
  /*CLIENTE HACE UNA RESERVACION*/
  mysqli_query($conexion,
      "INSERT INTO cliente(nombre, telefono, aparta, fecha)
        VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["telefono"]."', '".$_REQUEST["producto"]."', NOW())");
  /*CAMBIRA PRODUCTO A RESERVADO*/
  mysqli_query($conexion, "UPDATE producto SET reservado=1 WHERE idProducto='".$_REQUEST["producto"]."'");
  /*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  mysqli_query($conexion, "CREATE EVENT <?php ".$_REQUEST["producto"]."?>
 ON SCHEDULE AT current_timestamp + interval 1 minute 
 DO UPDATE producto SET reservado = 0 WHERE idProducto='".$_REQUEST["producto"]."'");
  /*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  $result = $conexion->query("SELECT idCliente FROM Cliente WHERE aparta='".$_REQUEST["producto"]."'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $codigo = $row["idCliente"];
    }
  }
  //-----------------
    ?>
    <script>
      alert("La reserva se ha concluido satisfactoriamente\nEl código a presentar en la sucursal es: <?php echo $codigo; ?>\nTiene 12 horas a partir de ahora para adquirir dicho producto en la sucursal\nEn caso contrario el producto será ofrecido a otros clientes");
    </script>
      <?php
}
if (!empty($_POST['reservargetID'])) {/*RESERVAR PRODUCTO*/
  $idProducto = $_POST['reservargetID'];
  $result = $conexion->query("SELECT nombre FROM Producto WHERE idProducto=$idProducto");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
    }
  }
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
  (!empty($_GET['categoria'] == "Computacion")) ||
  (!empty($_GET['categoria'] == "Consolas")) ||
  (!empty($_GET['categoria'] == "Celulares")) ||
  (!empty($_GET['categoria'] == "AudioVideo")) ||
  (!empty($_GET['categoria'] == "Juegos")) ||
  (!empty($_GET['categoria'] == "Televisores")) ||
  (!empty($_GET['categoria'] == "Electrodomesticos"))
)
 {  
  $categoria=$_GET['categoria'];
    $sql    = "SELECT idProducto, nombre, descripcion, marca, precio,rutaImagen,categoria FROM Producto
  WHERE categoria='$categoria' and reservado=0";
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}else {/*MOSTRAR PRODUCTOS*/
    $sql    = "SELECT idProducto, nombre, descripcion, marca,modelo, precio,rutaImagen,categoria FROM Producto WHERE reservado=0" ;
    $result = $conexion->query($sql);
    include("mostrarProductos.php");
}
}
}
?>

</html> 