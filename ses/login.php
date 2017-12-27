<?php
session_start();
ob_start();

include("../configuraciondb.php");
/*user and pass are empty*/
if($_REQUEST["user"] == "" or $_REQUEST["pass"] == "") {
?>

<script language="javascript">
  alert("Favor de llenar los campos correctamente.");
  window.location="logueo.php";
</script>

<?php
  } else {
    $r = mysqli_query($conexion,
      "SELECT idUsuario, idEmpleado, idPuesto, userName, password, tipoEmpleado
        FROM Usuario NATURAL JOIN Empleado NATURAL JOIN Puesto
        WHERE userName='".$_REQUEST["user"]."' and password='".$_REQUEST["pass"]."'");
    
    $r2 = mysqli_fetch_array($r);
    $r1 = mysqli_num_rows($r);

    if($r1 == 1) {//comparacion donde tiene que mostrar solo 1 registro (usuario nunca se debe de repetir)
      $_SESSION["usuario"] = $r2["userName"]; // declaracion de la variable de sesion usuario
      $_SESSION["tipo"] = $r2["tipoEmpleado"]; // declaracion de la variable de sesion tipo de usuario
/* = = = = = = = = =  = = =  = = = VISTAS USUARIOS = = =  = = =  = = =  = = =  = = */
      if($_SESSION["tipo"]=="ADMINISTRADOR"||
         $_SESSION["tipo"]=="GERENTE"||
         $_SESSION["tipo"]=="ENCARGADO DE PRODUCTOS"||
         $_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS") {
?>

  <script language="javascript">
    /*alert("Te haz logueado satisfactoriamente");*/
    window.location="../administrador/admin.php";
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