<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../db/configuracion.php");

?>
<html>
  <body>
    <center>
      <div class="tit">
        <h2 style="color: #0000FF; ">Inicio de sesión
        </h2>
        <form action="login.php" name="entrada_sistema" method="post" enctype="multipart/form-data">
          <table border="0">
            <tr>
              <td>
                <label >
                  <b>Usuario
                  </b>
                </label>
              </td>
              <td width=80> 
                <input type="text" name="user" value="" placeholder="Usuario" /> 
              </td>
            </tr>
            <tr>
              <td>
                <label>
                  <b>Contraseña
                  </b>
                </label>
              </td>
              <td witdh=80>
                <input type="password" name="pass" placeholder="Contraseña"  /> 
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td width=80 align=center>  
                <input type="submit" name="ingresar" class="btn btn-primary glyphicon glyphicon-plus" value="Ingresar">
              </td>
            </tr>
            </tr>
          </table>
        </form>
    </center>
  </body>
</html>
