<?php
session_start();
ob_start();
include("../db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($_REQUEST["user"] == "" or $_REQUEST["pass"] == "") {
  ?> 
  <script language="javascript"> 
    alert("Favor de llenar los campos."); 
    window.location="logueo.php"; 
  </script>
  <?php
} else {
  $r  = mysqli_query($conexion, "SELECT * FROM Usuario WHERE nombre='" . $_REQUEST["user"] . "'
    and password='" . $_REQUEST["pass"] . "'");
  $r2 = mysqli_fetch_array($r);
  $r1 = mysqli_num_rows($r);
//comparacion donde tiene que mostrar solo 1 registro (usuario nunca se debe de repetir)
  if ($r1 == 1) {
    $_SESSION["usuario"] = $r2["nombre"]; // declaracion de la variable de sesion usuario
    $_SESSION["area"]    = $r2["area"]; // declaracion de la variable de sesion area de usuario
    /*REDIRIGIR DEPENDIENDO DEL AREA*/
    if ($_SESSION["area"] == "ADMINISTRADOR" || $_SESSION["area"] == "GERENTE" || $_SESSION["area"] == "ENCARGADO TIENDA" ) {
?> 
         <script language="javascript">
          window.location="agregar.php"; 
          </script> 
          <?php
        }
    } else {
?> 
                <script language="javascript"> 
                 alert("Usuario o contraseña invalidos, intentelo de nuevo."); 
                 window.location="logueo.php"; 
                 </script>  
      <?php
    }
}
?>