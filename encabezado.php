
<html><!-- Declaración del tipo de documento => Versión de HTML a trabajar => HTML Versión 5-->
<html lang="es-ES">
<head>
  <meta charset="UTF-8"><!-- Permiete representar caracteres de varios paises (tildes, acentos ...) -->
  <title>Empeños Mexicanos</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/miCSS.css">
</head>

<body>
  <nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="nosotros.php"><span class="glyphicon glyphicon-globe"></span> Nosotros </a></li>
      <a class="navbar-brand">|</a>

      <li><a href="contactos.php"><span class="glyphicon glyphicon-phone-alt"></span> Contactos  </a></li>
      <a class="navbar-brand">   </a>
      <a class="navbar-brand">|</a>

      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio  </a></li>
      <a class="navbar-brand"></a>
  </ul>
<ul class="topnav">
      
      <div class="search-container">
         <form action="index.php" method="get">
            <input type="text" placeholder="Buscar producto.." name="search">
            <button type="submit">
               <span class="glyphicon glyphicon-search"> </span><!-- Icono de Busqueda -->
               
            </button>
         </form>
      </div>
      <a>Horario: Lunes a Domingo de 9:00 am a 9:00 pm 
      </a>
   </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="ses/logueo.php"><span class="glyphicon glyphicon-user"></span> Iniciar sesion</a></li>
  </ul>
</nav >

</body>
</html>
