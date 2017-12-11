<?php 
error_reporting(E_ALL ^ E_NOTICE);
include("../db/configuracion.php");
include("plantilla.php");
// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conexion->connect_error) {
die("Connection failed: " . $conexion->connect_error);
}
$sql    = "SELECT Nombre, Descripcion, Marca, Precio,rutaImagen,categoria FROM Producto";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
  if($row["categoria"]=="Celulares"){
?>
  <article>
    <div class="gallery">
      <a target="_blank"
         href="Images/<?php
               echo $row["rutaImagen"] . ".jpg";
                                               ?>">
        <img src="../Images/<?php
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
      <div class="precio">$ 
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
}
} else {
echo "0 results";
}
$conexion->close();
?>
</body>
<footer>Todos los derechos reservados</footer>
</html> 