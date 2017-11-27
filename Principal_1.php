<!DOCTYPE html>
<html>
<head>
  <!-- Caracteres -->
  <meta charset="utf-8">
  <title>Casa de empeños </title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
  <h1> CASA DE EMPEÑOS OAXACA </h1>
  <input type="text" name="txt_Buscar" placeholder="Buscar...">
  <button type="button">Buscar </button>
  <br>

  <?php
  error_reporting(E_ALL ^ E_NOTICE);
  include("configuracion.php");
  // Create connection
  $conexion = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
  }

  $sql = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen FROM Producto";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
      <div class="gallery">
        <a target="_blank"
        href="Images/<?php echo $row["rutaImagen"].".jpg"; ?>">
        <img src="Images/<?php echo $row["rutaImagen"].".jpg"	?>"  />
      </a>
      <div class="nombre"><?php echo $row["Nombre"] ?></div>
      <div class="marca"><?php echo $row["Marca"] ?></div>
      <div class="descripcion"><?php echo $row["Descripcion"] ?></div>
      <div class="precio"><?php echo $row["Precio"] ?></div>
    </div>
    <?php
  }
} else {
  echo "0 results";
}

$conexion->close();
?>

</body>
<!-- <footer>Todos los derechos reservados - FOOTER</footer>-->
</html>
