<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;

    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        //  $_GET["busquedaAlbum"]="1"; //para probar,
    
    $albumsList= databaseFactory::getTable("albums")->where("id", "=" , 
    $_GET["busquedaAlbum"])->get();
    $songs = databaseFactory::getTable("songs")->where("idAlbum", "=" , 
    $_GET["busquedaAlbum"])->get();
    
    $listaCanciones ="";
    $albumCount=0;
    foreach ($songs as $or) {
        $listaCanciones =  $listaCanciones .'<a href="#">'. $or->getTitle().' </a>';
    }
    $album=null;

   foreach($albumsList as $albumes) {
        $album=$albumes;
        $albumCount+=1;
    }
    if ($albumCount>0) {
        $albumError=false;
    } else 
        $albumError=true;
    } 
    else {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <meta charset="UTF-8">
    <title>Album</title>
    
</head>
<body>
    <header id="cabecera">
        <?php
        require 'includes/handlers/cabecera.php';
        ?>   
    </header>

    <script type="text/javascript">
    var error = '<?php echo $albumError; ?>';
    var canciones = '<?php echo $listaCanciones; ?>';
    if (!error) {
        document.write("<header>  <a> <img src= 'server/images/albums/");
        document.write("<?php echo $album->getId(); ?>");
        document.write(".jpg'>");
        document.write("<h1> ");
        document.write("<?php echo $album->getTitle(); ?>");
        document.write(" </h1> ");
        document.write(" <?php echo $album->getIdArtist(); ?> ");
        document.write("</a>  </header> ");
        document.write(canciones);
    } else {
        document.write("Error en el album");
    } 
   </script> 
   
</body>
</html>
