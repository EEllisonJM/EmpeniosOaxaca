 <?php
if ($result->num_rows > 0) {
    /*Mostrar los datos*/
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
        echo $row["nombre"];
?>
     </div>
      <div class="marca">
        <?php
        echo $row["marca"];
?>
     </div>
      <div class="descripcion">
        <?php
        echo $row["descripcion"];
?>
     </div>
      <div class="precio">
        <?php
        echo "$".$row["precio"];
?>
      </div>
      <div class="reservar">
        <form action="index.php" method="POST">
            <input type="text" hidden name="reservargetID" value='<?php echo $row['idProducto']; ?>'>
            <input type="submit" value="Reservar producto" />
        </form>
      </div>
    </div>
</article>
  <?php
    }
} else {
    echo "<article>";
    echo "Ningun resultado encontrado, intente buscar otro producto.";
    echo "</article>";
}
$conexion->close();
?> 