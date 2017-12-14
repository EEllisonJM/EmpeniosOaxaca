<?php
if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {  
?>
  <article>
    <div class="gallery">
      <a target="_blank"
         href="<?php
               echo $row["rutaImagen"];
                                               ?>">
        <img src="<?php
                  echo $row["rutaImagen"];
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
        <form action="reservar.php">
    <input type="submit" value="Reservar producto" />
</form>
      </div>
    </div>
  </article>
  <?php
}
} else {
  echo "<article>";
echo "Ningun resultado encontrado, intente buscar otro producto";
echo "</article>";
}
$conexion->close();
?>