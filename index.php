<html>
  <head>
    <!--Icono de Buscar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Css personalizado-->
    <link rel="stylesheet" href="css/myStyle.css">
  </head>
  <body>
    </div>
  <div class="topnav">
    <img src="LogoEmpresa.png">  
    <a class="active" href="#home">Home
    </a>
    <a href="#about">About
    </a>  
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Buscar.." name="search">
        <button type="submit">
          <i class="fa fa-search">
          </i>
        </button>
      </form>
    </div>
    <a>Horario de Atención: Lunes a Domingo de 9:00 am a 9:00 pm 
    </a>
    <a href="#contact">Login
    </a>
  </div>
  <div class="categoria">
    <nav>
    
  <ul>
    <a>Categorías
    </a>
    <li>
      <a href="#=?as=">Computacion
      </a>
    </li>
    <li>
      <a href="#">Consolas
      </a>
    </li>
    <li>
      <a href="#">Celulares
      </a>
    </li>
    <li>
      <a href="#">Audio y Video
      </a>
    </li>
    <li>
      <a href="#">Juegos
      </a>
    </li>
    <li>
      <a href="#">Televisores
      </a>
    </li>
  </ul>
  </nav>
  </div>
  <?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuracion.php");
// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conexion->connect_error) {
die("Connection failed: " . $conexion->connect_error);
}
$sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen FROM Producto";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
?>
  <article>
    <div class="gallery">
      <a target="_blank"
         href="Images/<?php
               echo $row["rutaImagen"] . ".jpg";
                                               ?>">
        <img src="Images/<?php
                  echo $row["rutaImagen"] . ".jpg";
                                                  ?>"  />
      </a>
      <div class="nombre">
        <?php
echo $row["Nombre"];
?>
      </div>
      <div class="marca">
        <?php
echo $row["Marca"];
?>
      </div>
      <div class="descripcion">
        <?php
echo $row["Descripcion"];
?>
      </div>
      <div class="precio">
        <?php
echo $row["Precio"];
?>
      </div>
      <div class="reservar"> 
        <button type="button">Reservar!
        </button> 
      </div>
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
<footer>Todos los derechos reservados</footer>
</html> 