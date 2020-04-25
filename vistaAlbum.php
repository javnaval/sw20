<?php
    require_once 'includes/config.php';
    require_once 'classes/factories/databaseFactory.php';
   // if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
       Application::getSingleton()->searchAlbum("1");

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
         <?php
            $albums1= databaseFactory::getTable("albums")->where("id", "=" , 
             Application::getSingleton()->getSearchAlbum())->get();
            $songs = databaseFactory::getTable("songs")->where("idAlbum", "=" , 
            Application::getSingleton()->getSearchAlbum())->get();

            foreach($albums1 as $albumes) {
                 $album=$albumes;
             }
            if ($album!=null) {
            if (!$album->checkNull()) {

                echo ' Álbum no encontrado ';
            }
            else {
                //portada del álbum, título y nombre del artista
                echo '
                <header>
                <a>
                    <img src="server/images/albums/'.$album->getId().'.jpg">
                    <h1> '. $album->getTitle() . ' </h1>
                    '. $album->getIdArtist() .'
                </a>
                </header>
                <div class = "vertical menu", id="lista">
                ';
                //lista de canciones
                foreach ($songs as $song) {
                    echo '<a href="#"> '.$song->getTitle().'</a>';
                }
                echo '
                </div>
        
                ';
            } 
        }
        ?>
   

   


</body>
<?php 

 //else {
   // require_once 'vistaInicio.php';
 // }
?>
</html>
