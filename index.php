<!-- Versión -->
<!DOCTYPE html> 
<html>
  <head>
    <!-- Caracteres --> 
    <meta charset="utf-8">
    <title>Casa de empeños </title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <body>
    <h1> CASA DE EMPEÑOS OAXACA </h1>
    <input type="text" name="txt_Buscar" placeholder="Buscar..."> 
    <button type="button">Buscar </button> 
    <br>
    <?php
$folder_path = 'images/'; //image's folder path
$num_files   = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
$folder      = opendir($folder_path);
if ($num_files > 0) {
    while (false !== ($file = readdir($folder))) {
        $file_path = $folder_path . $file;
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
?>
   <div class="gallery">
      <a target="_blank" 
      href="Apartar_
      <?php echo $file_path; ?>">
        <img src="<?php echo $file_path; ?>"  alt="Hope"/>
      </a>              
      <div class="nombre">Producto</div>
      <div class="descripcion">Soy un producto muy caro </div>
      <div class="precio">Cuesto tanto </div>      
      <div class="reservar"> <button type="button">Reservar!</button> </div>      
    </div>
    <?php
        }
    }
} else {
    echo "the folder was empty !";
}
closedir($folder);
?>
 </body>
</html>