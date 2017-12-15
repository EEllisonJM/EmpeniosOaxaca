<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../db/configuracion.php");
?>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <form action="login.php" name="entrada_sistema" method="post" enctype="multipart/form-data">
         <header>Iniciar sesión</header>
         <label>Usuario</label>
         <input type="text" name="user" value="" placeholder="Usuario" />         
         <label>Contraseña</label>
         <input type="password" name="pass" placeholder="Contraseña"  />
         <button>Login</button>
      </form>
   </body>
</html>