<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE);/*Ocultar errores*/
include("../db/configuracion.php");
include("menu.php");

if($_SESSION["area"]=="ADMINISTRADOR"||$_SESSION["area"]=="GERENTE"||$_SESSION["area"]=="ENCARGADO PRODUCTOS"||$_SESSION["area"]=="JEFE DE RECURSOS HUMANOS")
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
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
   <link rel="stylesheet" href="estilo.css">
   
</head>
<body>


 
<div class='centrar'>
  
    <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left" align="center"> 
      <!--Formulario-->    
      <div class="col-sm-6">
      <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" name="registro" method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <label>Producto</label><br>
        <input type="text" class="col-md-8" name="nombre" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
      </div>

     <div class="form-group">
        <label>Categoria</label><br>
        
      <select name="area">
            <option value="Audio y video">Audio y video</option>
            <option value="Consolas">Consolas</option>
            <option value="Celulares">Celulares</option>
            <option value="Computacion">Audio y video</option>
            <option value="Juegos">Juegos</option>
            <option value="Televisores">Televisores</option>

        </select>
      </div>

     <div class="form-group">
        <label>Cantidad</label><br>
    <input type="number" class="col-md-8"  name="existencia" min="0" max="50000" required>
      </div>

      <div class="form-group">
        <label>Precio</label><br>
    <input type="number" class="col-md-8"  name="precio" min="0" max="10000" required>
      </div>

      <div class="form-group col-md-6">
            <input type="submit" name="registrar" class="btn btn-primary glyphicon glyphicon-plus" value="Registrar">
            <a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
      </div>
    </form>
  </div>
    <!--Formulario-->
    </div>
    </div>

  </div>

</div>

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
        window.location = "../ses/logueo.php";
    </script>
<?php
  }
?>