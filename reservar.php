<article>
      <form action="index.php" method="POST">
        <br>
        Nombre : <input type="text" name="nombre">
        <br>
        Telefono : <input type="text" name="telefono">
        <br>
        Producto : <?php echo $nombre; ?>
        <input type="text" hidden name="producto" value='<?php echo $idProducto; ?>'>
        <br>
        <input type="submit" value="Confirmar reserva" name="btnConfirmar" />
      </form>
</article>
