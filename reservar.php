<article>
      <form action="index.php" method="POST">
        <br>
        Nombre : <input type="text" name="nombre">
        <br>
        Telefono : <input type="text" name="Telefono">
        <br>
        Codigo : <input type="text" name="Codigo">
        <br>
        Producto : <?php echo $esteid; ?>
        <br>
        <input type="submit" value="Confirmar reserva" name="btnConfirmar" />
      </form>
</article>
