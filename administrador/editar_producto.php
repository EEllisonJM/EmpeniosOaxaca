<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE);/*Mo mostrar errores de sintaxis*/

include("../db/configuracion.php"); //conexion de base de datos
include("menu.php");

if ($_SESSION["tipo"] == "ADMINISTRADOR" ||
    $_SESSION["tipo"] == "GERENTE") {
?>

<html>
   <script src="../angular.min.js"></script>
   <head>
      <meta charset="UTF-8">
      <title>Hospital</title>
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="estilo_admin.css">
      <link rel="stylesheet" href="estilo.css">
   </head>
   <body>
      <center><label style="font-weight:bold; font-size: 30pt;">Listado de Productos</label></center>
      <div ng-app="myApp" ng-controller="namesCtrl" class="centrar col-md-6" >
         <div class="container col-sm-12">
            <div class="col-sm-3"></div>
            <button align="center" class="btn btn-primary" ng-click="test.reservado=''">Mostrar Todos</button>
            <button align="center" class="btn btn-primary" ng-click="test.reservado=1">Mostrar Activos</button>
            <button align="center" class="btn btn-primary" ng-click="test.reservado=0">Mostrar Inactivos</button>
            <br><br>
         </div>
         <table border="2" align="center" class="table table-striped">
            <thead>
               <tr>
                  <td align="center" colspan="7">Datos</td>
               </tr>
            </thead>
            <thead>
               <tr>
                  <th>ID Producto</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Reservado</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tr ng-repeat="x in names | filter:test:strict">
               <td>
                  <div ng-hide="viewField">{{ x.idProducto | uppercase }}</div>
                  <div ng-show="modifyField"><input type="text" ng-model="x.idProducto" /></div>
               </td>
               <td>
                  <div ng-hide="viewField">{{ x.nombre | uppercase }}</div>
                  <div ng-show="modifyField"><input type="text" ng-model="x.nombre" /></div>
               </td>
               <td>
                  <div ng-hide="viewField">{{ x.descripcion | uppercase }}</div>
                  <div ng-show="modifyField"><input type="text" ng-model="x.descripcion" /></div>
               </td>
               <td>
                  <div ng-hide="viewField">{{ x.marca | uppercase }}</div>
                  <div ng-show="modifyField"><input type="text" ng-model="x.marca" /></div>
               </td>
               <td>
                  <div ng-hide="viewField">{{ x.modelo | uppercase }}</div>
                  <div ng-show="modifyField"><input type="text" ng-model="x.modelo" /></div>
               </td>
               <td>
                  <div ng-hide="viewField">{{ x.reservado }}</div>
                  <div ng-show="modifyField"><select name="Farmacia" ng-model="x.reservado">
                     <?php    
                        echo "<option value='1'>Reservado</option>";      
                        echo "<option value='0'>Desactivado</option>";
                        ?>
                     </select>
                  </div>
               </td>
               <td>
                  <button class="btn btn-warning" ng-hide="viewField" ng-click="modify(tableData)">Editar</button>
                  <button class="btn btn-sucess" ng-show="modifyField" ng-click="update(x) ">Guardar</button>
               </td>
            </tr>
         </table>
      </div>
<script>
angular.module('myApp', []).controller('namesCtrl', function($scope, $http) {
$http.get("../BD_Producto.php")
  .then(function (response) {
    $scope.names = response.data.datos;
    $scope.mirespuesta=null;
  });

$scope.modify = function(tableData) {
    $scope.modifyField = true;
    $scope.viewField = true;
  };
$scope.update = function(tableData){
$http.post("../Update_Producto.php",{
  "idProducto":tableData.idProducto,
  "nombre":tableData.nombre,
  "descripcion":tableData.descripcion,
  "marca":tableData.marca,
  "modelo":tableData.modelo,
  "reservado":tableData.reservado } )
  .then(function(response){
        $scope.modifyField = false;
        $scope.viewField = false;
      })
//  .catch(angular.noop);
  .catch(function (error) {
            // pass the error the the error service
            return errorService.handleError(error);
          })
    };
$scope.delete = function(tableData){
  $http.post('../Delete_Producto.php',{
    "idProducto":tableData.idProducto})
  $http.get("../BD_Producto.php")
      .then(function (response) {
        $scope.names = response.data.datos;
        $scope.mirespuesta=null;
      });
    };
});

</script>

<div class="col-md-8">
<center><a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</center>
</div>
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
