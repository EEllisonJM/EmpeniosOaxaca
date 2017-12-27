<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
require("../db/configuracion.php");
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
    <center>
      <label style="font-weight:bold; font-size: 30pt;">Listado de Empleados</label>
    </center>

    <div ng-app="myApp" ng-controller="namesCtrl" class="centrar col-md-6">
      <div class="container col-sm-12">
        <div class="col-sm-3"></div>
        <button align="center" class="btn btn-primary" ng-click="test.visible=''">Mostrar Todos</button>
        <button align="center" class="btn btn-primary" ng-click="test.visible=1">Mostrar Activos</button>
        <button align="center" class="btn btn-primary" ng-click="test.visible=0">Mostrar Inactivos</button>
        <br><br>
      </div>
      
      <table border="2" align="center" class="table table-striped">
        <thead>
          <tr>
            <td align="center" colspan="14" style="color: blue;">Datos</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th>ID Empleado</th>
            <th>ID Puesto</th>
            <th>Nombre empleado</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Telefono</th>
            <th>Calle</th>
            <th>Colonia</th>
            <th>CP</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tr ng-repeat="x in names | filter:test:strict">
          <td>
            <div ng-hide="viewField">{{ x.idEmpleado | uppercase }}</div>
            <div ng-show="modifyField"><input type="text" ng-model="x.idEmpleado" /></div>
          </td>

          <td>
            <div ng-hide="viewField">{{ x.idPuesto | uppercase }}</div>
            <div ng-show="modifyField"><input type="text" ng-model="x.idPuesto" /></div>
          </td>

          <td>
            <div ng-hide="viewField">              
              {{ x.apellidoP | uppercase }}
              {{ x.apellidoM | uppercase }}
              {{ x.nombre | uppercase }}
            </div>

            <td>
              <div ng-hide="viewField">{{ x.sexo | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.sexo" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.fecha_nacimiento | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.fecha_nacimiento" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.telefono | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.telefono" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.calle | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.calle" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.colonia | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.colonia" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.codigo_postal | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.codigo_postal" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.ciudad | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.ciudad" /></div>
            </td>

            <td>
              <div ng-hide="viewField">{{ x.e_mail | uppercase }}</div>
              <div ng-show="modifyField"><input type="text" ng-model="x.e_mail" /></div>
            </td>

            <td>
              <button class="btn btn-danger" ng-hide="viewField" ng-click="delete(x)">Eliminar</button>
            </td>
          </tr>
        </table>
      </div>

    <script>
      angular.module('myApp', []).controller('namesCtrl', function($scope, $http) {
        $http.get("../BD_Empleado.php")
        .then(function (response) {
          $scope.names = response.data.datos;
          $scope.mirespuesta=null;
        });
      $scope.modify = function(tableData) {
        $scope.modifyField = true;
        $scope.viewField = true;
      };
      $scope.delete = function(tableData){
        $http.post('../Delete_Empleado.php',{
          "id":tableData.idEmpleado})
        $http.get("../BD_Empleado.php")
        .then(function (response) {
          $scope.names = response.data.datos;
          $scope.mirespuesta=null;
        });
      };
    });
  </script>

  <div class="col-md-8">
    <center>
      <a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>Regresar</a>
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