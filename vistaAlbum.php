<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\classes\user as user;

    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    $_GET["busquedaAlbum"]="1"; //para probar,
    
    $albumsList = new Albums();
    $albumsList = $albumsList->where("id", "=" , 
    $_GET["busquedaAlbum"])->get();
    $songs = new Songs();
    $songs = $songs->where("idAlbum", "=" , 
    $_GET["busquedaAlbum"])->get();
    
    $listaCanciones ="<canciones>";
    foreach ($songs as $or) {
        $listaCanciones =  $listaCanciones .'<a href="vistaCancion.php?idCancion='.
        $or->getId().'" >'. $or->getTitle().' </a>';
    }
    $listaCanciones =  $listaCanciones . '</canciones>';
    $album=null;
    $albumCount=0;

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
    $albumId= $album->getId();
    $albumArtist= $album->getIdArtist();
    $albumTitle= $album->getTitle();

    function viewAlbumInfo($albumId, $albumArtist, $albumTitle) {
        echo "<header>  <a> <img src= 'server/images/albums/";
        echo $albumId;
        echo ".png'>";
        echo "<h1> ";
        echo $albumTitle;
        echo " </h1> ";
        echo $albumArtist; 
        echo "</a>  </header> ";
    }

    function viewSongList($listaCanciones) {
        echo $listaCanciones;
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

    <script type="text/javascript">
    var error = '<?php echo $albumError; ?>';
    if (!error) {
        document.write("<?php viewAlbumInfo($albumId, $albumArtist, $albumTitle); ?>");
    } else {
        document.write("Error en el album");
    } 
   </script> 
    <?php viewSongList($listaCanciones); ?>
    
   </section>

   <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>
  
</body>
</html>
