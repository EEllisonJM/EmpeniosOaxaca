<?php
//ABM (Alta, Baja y Modificacion)
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos

$conexion = new mysqli($servername, $username, $password, $dbname);
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}
?>

<!DOCTYPE htm>
<html>
<head>
  <meta charset="UTF-8">
  <title>ABM Productos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
  <center>
    <div class="centrar">
      <center><label style="font-weight:bold; font-size: 14pt;">Listado de Productos</label></center>

      <table border="2" align="center">
        <tr>
          <td align="center" colspan="4">Datos</td>
        </tr>

        <tr>
          <td>Nombre</td>
          <td>Descripcion</td>
          <td align="center" colspan="2">Accion</td>
        </tr>

      </div>
  </center>


    <?php
    $consulta = mysqli_query($conexion,"SELECT * FROM Producto");
    //consulta donde muestra solamente los campos que esten activados por la bandera
    while($registro = mysqli_fetch_array($consulta))
    {
      ?>
      <tr>
        <td><?php echo $registro["nombre"]; ?></td>
        <td><?php echo $registro["descripcion"]; ?></td>
        <td><a href="editar_area.php?id=<?php echo $registro["idProducto"];?>">Editar</a></td>
        <!-- se hipervincula al archivo editar mandando como parametros o valores heredados
        el valor de id con variable "id" para su manipulacion  -->
        <td><a href="eliminar_area.php?id=<?php echo $registro["idProducto"];?>">Eliminar</a></td>
        <!-- se hipervincula al archivo eliminar mandando como parametros o valores heredados
        el valor de id con variable "id" para su manipulacion  -->
      </tr>
      <?php
    }
    ?>


  </table>


</body>
</html>
