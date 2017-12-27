<style type="text/css">
    form .help {
        margin-left: 20px;
        font-size: 0.8em;
        color: #777;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->

<article>
      <form action="index.php" method="POST">
        <br>
        <label><b>Nombre completo : </b></label><br>
        <input type="text" pattern="^[A-Z a-z]{10,35}$" name="nombre" title="Favor de ingresar su nombre completo" required style="width:30%">
        <br>
        <label ><b>Telefono : </b></label><br>
        <input type="text" pattern="\d{3}\d{3}\d{4}" name="telefono" title="No se admiten caracteres, acaso no sabes tú numero telefónico?, pon la de un amigo a la de alguien!!"  required style="width:30%">
        <div class="help">10 dígitos</div>
        Producto : <?php echo $nombre; ?>
        <input type="text" hidden name="producto" value='<?php echo $idProducto; ?>'>
        <br>
        <input type="submit" value="Confirmar reserva" name="btnConfirmar"/>
      </form>
</article>
