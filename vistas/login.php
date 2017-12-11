<?php
session_start();
ob_start();
include("../db/configuracion.php");
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($_REQUEST["user"] == "" or $_REQUEST["pass"] == "") {
?> 
       <script language="javascript"> 
        alert("\tRellena los Campos Correctamente \n \tFavor de verificar"); 
        window.location="menu.php"; 
      </script>           
      <?php
}
//}
else {
    $r  = mysqli_query($conexion, "SELECT * FROM Usuario WHERE nombre='" . $_REQUEST["user"] . "'
                        and password='" . $_REQUEST["pass"] . "'");
    $r2 = mysqli_fetch_array($r);
    
    $r1 = mysqli_num_rows($r);
    
    if ($r1 == 1) //comparacion donde tiene que mostrar solo 1 registro (usuario nunca se debe de repetir)
        {
        $_SESSION["usuario"] = $r2["nombre"]; // declaracion de la variable de sesion usuario
        $_SESSION["area"]    = $r2["area"]; // declaracion de la variable de sesion area de usuario
        //Te refirige a la vista
        if ($_SESSION["area"] == "ADMINISTRADOR" || $_SESSION["area"] == "GERENTE" || $_SESSION["area"] == "ENCARGADO TIENDA" ) {
?> 
         <script language="javascript"> 
          alert("Te haz logueado satisfactoriamente"); 
          window.location="agregar.php"; 
          </script> 
          <?php
        }
    } else {
?> 
                <script language="javascript"> 
                 alert("Error, Escriba correctamente su Usuario y/o Password"); 
                 window.location="logueo.php"; 
                 </script>  
      <?php
    }
}
?>