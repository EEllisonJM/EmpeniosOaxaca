<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE);/*Ocultar errores*/
include("../db/configuracion.php");
include("menu.php");

if($_SESSION["area"]=="ADMINISTRADOR"||$_SESSION["area"]=="GERENTE"||$_SESSION["area"]=="ENCARGADO PRODUCTOS")
{
  if($_REQUEST['registrar'] == "Registrar") 
  //$_REQUEST registrar invoca al name del boton y lo compara con el value del input del boton
{

  $resultado = mysqli_query($conexion,"INSERT INTO Farmacia (nomproducto, areaproducto, existencia, precio, visible) 
  VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["area"]."', '".$_REQUEST["existencia"]."', '".$_REQUEST["precio"]."', '1')");

?>
       <script>
                  alert("Producto Agregado con exito");
       </script>
    <?php   
}

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Casa de empeños</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
   <link rel="stylesheet" href="estilo.css">
   
</head>
<body>


</body>

</html>


<?php 

}
/*Si no ha iniciado sesion, mensaje de alerta*/
else
  {
?>
    <script>
        alert("Acceso Denegado");
        window.location = "logueo.php";
    </script>
<?php
  }
?>