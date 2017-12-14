 <?php
error_reporting(E_ALL ^ E_NOTICE);
include("db/configuracion.php");
/*[Registrar] => Producto*/
if (!empty($_POST)) {
    /*Conexion con la base de datos en el servidor*/
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $errors    = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp  = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext  = strtolower(end(explode('.', $_FILES['image']['name'])));
    
    /* Guardando los valores ingresados*/
    $nombre      = $_POST['nombre'];
    $marca       = $_POST['marca'];
    $modelo      = $_POST['modelo'];
    $precio      = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    /*Extension permitida*/
    $expensions = array(
        //"jpeg",
        "jpg"//,
        //"png"
    );    
    /*Esto ya no es necesario*/
    //if (in_array($file_ext, $expensions) === false) {
        //$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    //}    
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    
    // Imprimiendo los valores capturados
    if (empty($errors) == true) {/*No hay errores*/
        move_uploaded_file($file_tmp, "images/" . $file_name);
        $imagenruta = "/EmpeniosOaxaca/images/" . $file_name;
        /*Insertar datos a la base de datos*/
        $resultado = mysqli_query($conexion, "INSERT INTO Producto (nombre, descripcion, marca, modelo, precio, rutaImagen, categoria, reservado)
          VALUES ('$nombre','$descripcion','$marca',$modelo ,$precio, '$imagenruta','$categoria','0')");
    } else {
        print_r($errors);
    }
}
?> 
<html>
   <body>
      <form action="" method="POST" enctype="multipart/form-data">
        <br>
        Nombre : <input required type="text" pattern="[a-zA-Z][a-zA-Z0-9\s]{2,}" title="Ingrese un nombre valido" name="nombre">
        <br>
        Marca : <input required type="text" pattern="[a-zA-Z][a-zA-Z0-9\s]{2,}" title="Ingrese una marca valida" name="marca">
        <br>
        Modelo : <input required type="text" pattern="[a-zA-Z][a-zA-Z0-9\s]{2,}" title="Ingrese un modelo valido" name="modelo">
        <br>
        Precio : $<input required pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
            title="Ingrese un precio valido" name="precio">
        <br>
        Descripción : <textarea required name="descripcion" pattern="[a-zA-Z][a-zA-Z0-9\s]{10,}" title="Ingrese una breve descripción del prouducto" id="TextAreaproducto" rows="3"></textarea>
        <br>
        Imagen : <input required type="file" name="image" />
        <br>
        <input type="submit" value="Registrar" />
      </form>
   </body>
</html>