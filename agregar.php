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
<html>
<html lang="es-ES">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
<title>Empenios Oaxaca</title>
    <script type="text/javascript">
        function showFileName() {
           var fil = document.getElementById("myFile");
           alert(fil.value);
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body class="container">
    <div class="col-lg-4 col-offset-6 centered">
        <form method="POST" action="agregar.php">
          <div class="form-group">
            <label for="InputProducto">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="InputProducto" aria-describedby="textHelp" placeholder="Nombre de producto">
            <small id="textHelp" class="form-text text-muted">Un nombre corto y simple.</small>
          </div>

          <div class="form-group">
            <label for="InputProducto">Marca</label>
            <input type="text" name="marca" class="form-control" id="InputProducto" aria-describedby="textHelp" placeholder="HP,Apple">
          </div>

          <div class="form-group">
            <label for="InputProducto">Precio</label>
            <input type="text" name="precio" class="form-control" id="InputProducto" aria-describedby="textHelp" placeholder="120.0">
          </div>

          <div class="form-group">
            <label for="TextAreaproducto">Descripción</label>
            <textarea name="descripcion" class="form-control" id="TextAreaproducto" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="fileProduct">Seleccionar imagen</label>
            <input type="file" name="rutaImagen" class="form-control-file" id="fileProduct">
          </div>

          <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>