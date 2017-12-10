<!DOCTYPE html>
<html>
<head>
  <!-- Caracteres -->
  <meta charset="utf-8">
  <title>Casa de empeños </title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
  <div class="container">
  <header>
    <h1>Apartado de los productos ofrecidos por la empresa Empeños Mexicanos Oaxaca</h1>
    <nav><a>Horario de Atención:</a></nav>
    <nav><a>Lunes a Domingo</a></nav>
    <nav><a>9:00 am a 9:00 pm</a></nav>
    <nav><input type="text" name="txt_Buscar" placeholder="Buscar..."></nav>
     <nav><button type="button">Buscar </button></nav>
     <a href="#">Login</a>
  </header>
  <br>
  <nav>
  <ul>
    <a>Categorías</a>
    <li><a href="cargar=?as=">Video juegos</a></li>
    <li><a href="#">Computadoras</a></li>
    <li><a href="#">Televisores</a></li>
    <li><a href="#">Celulares</a></li>
  </ul>
</nav>


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
      <article>
        <div class="gallery">
          <a target="_blank"
          href="Images/<?php echo $row["rutaImagen"].".jpg"; ?>">
          <img src="Images/<?php echo $row["rutaImagen"].".jpg"	?>"  />
        </a>
        <div class="nombre"><?php echo $row["Nombre"] ?></div>
        <div class="marca"><?php echo $row["Marca"] ?></div>
        <div class="descripcion"><?php echo $row["Descripcion"] ?></div>
        <div class="precio"><?php echo $row["Precio"] ?></div>
        <div class="reservar"> <button type="button">Reservar!</button> </div>
      </div>
      </article>

    <?php
  }
} else {
  echo "0 results";
}

$conexion->close();
?>

</body>
<footer>Todos los derechos reservados - FOOTER</footer>
</html>
