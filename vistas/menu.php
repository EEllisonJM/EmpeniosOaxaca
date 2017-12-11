<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="UTF-8">
    <title>Hospital</title>
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
          <?php echo ' '.$_SESSION["area"],': '.$_SESSION["usuario"]; ?>
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
        <?php if($_SESSION["area"]=="ADMINISTRADOR"){ ?>
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
if($_SESSION["area"]=="GERENTE"||$_SESSION["area"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Productos
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
if($_SESSION["area"]=="JEFE DE AREA"||$_SESSION["area"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Area
          </a>
          <ul>
            <li>
              <a href="agregar_area.php">Alta
              </a>
            </li>
            <li>
              <a href="eliminar_area.php">Baja
              </a>
            </li>
            <li>
              <a href="editar_area.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["area"]=="ENCARGADO DE FARMACIA"||$_SESSION["area"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Farmacia
          </a>
          <ul>
            <li>
              <a href="agregar_producto.php">Alta
              </a>
            </li>
            <li>
              <a href="eliminar_producto.php">Baja
              </a>
            </li>
            <li>
              <a href="editar_producto.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["area"]=="JEFE DE RECURSOS HUMANOS"||$_SESSION["area"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Recursos Humanos
          </a>
          <ul>
            <li>
              <a href="">Asignar Area
              </a>
              <ul>
                <li>
                  <a href="">Alta
                  </a>
                <li>
                  <a href="editar_recursos_humanos_area.php">Editar
                  </a>
                </li>
                <li>
                  <a href="eliminar_recursos_humanos.php">Baja
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="">Asignar sueldo
              </a>
              <ul>
                <li>
                  <a href="">Alta
                  </a>
                </li>
                <li>
                  <a href="editar_recursos_humanos_sueldo.php">Editar
                  </a>
                </li>
                <li>
                  <a href="eliminar_recursos_humanos.php">Baja
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="">Reportes
          </a>
          <ul>
            <li>
              <a href="">Mostrar Nomina Total
              </a>
              <ul>
                <li>
                  <a href="../pdf/reportes/interfaz_area.php">Por Area
                  </a>
                </li>
                <li>
                  <a href="../pdf/reportes/interfaz_sueldo.php">Por Sueldo
                  </a>
                </li>
                <li>
                  <a href="../pdf/reportes/interfaz_asistencia.php">Asistencia
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="">Mostrar Todos Los Medicamentos
              </a>
              <ul>
                <li>
                  <a href="../pdf/reportes/interfaz_precio.php">Por precio
                  </a>
                </li>
                <li>
                  <a href="../pdf/reportes/interfaz_area.php">Por area
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div>
  </body>
</html>
