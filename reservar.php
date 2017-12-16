<style type="text/css">
    article {
        background: #fff;
    }
    br {
        font-size: 20px;
    }
    form .help {
        margin-left: 20px;
        font-size: 0.8em;
        color: #777;
    }
</style>

<article>
      <form action="index.php" method="POST">
        <br>
        Nombre completo: <input type="text" pattern="^[A-Z a-z]{10,35}$" name="nombre" title="Favor de ingresar su nombre completo" required>
        <br>
        Telefono : <input type="text" pattern="\d{3}\d{3}\d{4}" name="telefono" title="No se admiten caracteres, acaso no sabes tú numero telefónico?, pon la de un amigo a la de alguien!!"  required>
        <br>
        <div class="help">10 dígitos</div>
        <br>
        Producto : <?php echo $nombre; ?>
        <input type="text" hidden name="producto" value='<?php echo $idProducto; ?>'>
        <br>
        <input type="submit" value="Confirmar reserva" name="btnConfirmar" />
      </form>
</article>
