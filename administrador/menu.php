<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="UTF-8">
    <title>Empeños Mexicanos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo_admin.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <!-- ============ ENLACES DE NAVEGACION ====================== -->
  <body>
    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav navbar-left">
        <a class="navbar-brand">
          <span class="glyphicon glyphicon-user"> </span>
          <?php echo ' '.$_SESSION["tipo"],': '.$_SESSION["usuario"]; ?>
        </a>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="../ses/logout.php">
            <span class="glyphicon glyphicon-ban-circle"> </span> Cerrar sesion
          </a>
        </li>
      </ul>
    </nav >

    <div id="header">
      <ul class="nav">
        <?php if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Usuario
          </a>
          <ul>
            <li>
              <a href="agregar_usuario.php">Alta
              </a>
            </li>
            <li>
              <a href="eliminar_usuario.php">Baja
              </a>
            </li>
            <li>
              <a href="editar_usuario.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php
}
if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Empleado
          </a>
          <ul>
            <li>
              <a href="agregar_empleado.php">Alta
              </a>
            </li>
            <li>
              <a href="eliminar_empleado.php">Baja
              </a>
            </li>
            <li>
              <a href="editar_empleado.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Productos
          </a>
          <ul>
            <li>
              <a href="agregar_producto.php">Agregar
              </a>
            </li><!--
            <li>
              <a href="eliminar_producto.php">Baja
              </a>
            </li>
            <li>
              <a href="editar_producto.php">Editar
              </a>
            </li>-->
          </ul>
        </li>        
        <?php }
if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Reservado
          </a>
          <ul>            
            <li>
              <a href="buscador.php">Buscar codigo
              </a>
            </li>
          </ul>
        </li>        
        <?php } ?>        

      </ul>
    </div>
  </body>
</html>