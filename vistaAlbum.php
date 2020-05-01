<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;

    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        $album = album::buscaAlbumId($_GET["id"]);
        $songs = song::buscaSongsIdAlbum($_GET["id"]);

        $listaCanciones = '';
        foreach ($songs as $or) {
            $listaCanciones .= '<p><a href="vistaCancion.php?id='. $or->getId().'" >'. $or->getTitle().' </a></p>';
        }
    }
    else {
        header("Location: index.php");
    }

    $albumArtist= user::buscaUsuarioId($album->getIdArtist())->getName();
    $albumTitle = $album->getTitle();
    $albumId = $album->getId();

    function viewAlbumInfo($albumId, $albumArtist, $albumTitle) {
        echo '<header><img src= "server/albums/images/'.$albumId.'.png">';
        echo "<h1>$albumTitle</h1> ";
        echo $albumArtist;
        echo "</header> ";
    }

    function sidebar(){
        if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
        else require 'includes/handlers/sidebarLeft.php';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Album</title>
    
</head>
<body>
    <div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <section id="contents" class="contents">
        <?php
        viewAlbumInfo($albumId, $albumArtist, $albumTitle);
        echo '<p>'.$listaCanciones.'</p>';
        ?>
    </section>

   <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>
  
</body>
</html>
