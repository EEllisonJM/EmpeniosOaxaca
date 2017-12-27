<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis

include("menu.php");

if ($_SESSION["tipo"] == "ADMINISTRADOR" ||
    $_SESSION["tipo"] == "GERENTE") {
?>


<style>
   table, th , td  {
   border: 1px solid grey;
   border-collapse: collapse;
   padding: 5px;
   }
   table tr:nth-child(odd) {
   background-color: #f1f1f1;
   }
   table tr:nth-child(even) {
   background-color: #ffffff;
   }
</style>
<!DOCTYPE html>
<html>
   <script src="../angular.min.js"></script>
   <body>
      <div class='centrar'>
         <div ng-app="myApp" ng-controller="namesCtrl" >
            <p>Codigo producto reservado:</p>
            <p><input type="text" ng-model="test"></p>
            <table>
               <td>Numero de Inventario</td>
               <td>Concepto</td>
               <td>Tipo</td>
               <tr ng-repeat="x in names | filter:test">
                  <!--<img src="{{x.idProducto}}.jpg"/><br>-->
                  <td>{{ x.idProducto }}</td>
                  <td>{{ x.nombre }}</td>
                  <td>{{ x.marca }}</td>
                  <td><a href="../pdf/reportes.php">Procesar compra</a></td>
               </tr>
               </li>
               </ul>
            </table>
         </div>
      </div>
      <script>
         angular.module('myApp', []).controller('namesCtrl', function($scope, $http) {
         $http.get("../servidor_bd.php")
            .then(function (response) {$scope.names = response.data.datos; $scope.mirespuesta=null;});    
         });
      </script>
   </body>
</html>

<?php
   } else {
?>

  <script>
       alert("Acceso Denegado");
       window.location = "../ses/logueo.php";
   </script>
<?php
}
?>