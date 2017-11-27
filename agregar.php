<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include ("configuracion.php"); //conexion de base de datos
//$_REQUEST registrar invoca al name del boton y lo compara con el value del input del boton
if($_REQUEST['registrar'] == "Registrar"){
  if($_REQUEST["nombre"] == "" or $_REQUEST["descripcion"] == "")
  // aqui hacemos la validacion de que no existan campos vacios, sean ambos o alguno de los 2 en este ejemplo.
  {         //aqui ventana de alerta en JavaScript mostrando el detalle en cuestion.
    ?>
       <script>
                  alert("Rellena los campos, por favor.");
       </script>
    <?php   
  }
  else
    
  $resultado = mysqli_query($conexion,"INSERT INTO Producto (nombre, descripcion, marca,precio,rutaImagen, reservado) 
  VALUES (
  '".$_REQUEST["nombre"]."',
  '".$_REQUEST["descripcion"]."',
  '".$_REQUEST["marca"]."',
  ".$_REQUEST["precio"].",
  '".$_REQUEST["rutaImagen"]."',
  0
)");
 echo realpath($_REQUEST["rutaImagen"]);
}
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <script type="text/javascript">
function showFileName() {
   var fil = document.getElementById("myFile");
   alert(fil.value);
}
</script>

</head>
<body>

      <div class="form-group">
        <label>Nombre</label><br>
        <input type="text" name="nombre" maxlength="60" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label>Descripcion</label><br>
        <input type="text" name="descripcion" maxlength="80" placeholder="Descripción">
      </div>
      <div class="form-group">
        <label>Marca</label><br>
        <input type="text" name="nombre" maxlength="60" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label>Precio</label><br>
        <input type="text" name="descripcion" maxlength="80" placeholder="Descripción">
      </div>

<form method="POST" action="agregar.php" enctype="multipart/form-data">
    <p>File to upload : <input type ="file" name = "UploadFileName"></p><br />
    <input type = "submit" name = "Submit" value = "Press THIS to upload">
</form>

      <div class="form-group col-md-6">
            <input type="submit" name="registrar" value="Registrar">
      </div>
    </form>
  </div>
</body>

</html>
