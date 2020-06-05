<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\songForum as songForum;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}

function muestraCancion($idCancion){
    $html = "";
    $song = song::buscaSongId($idCancion);
    if ($song !== null) {
        $html .= "<div class=\"imagen\"><img src='images/Colores.jpg'></div><div class=\"titulo\">";
        $html .= $song->getTitle();
        $html .= '</div><div class="audio"><audio src="server/songs/' . $song->getId() . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio></div>';

    } else $html .= 'Se ha eliminado correctamente';

    return $html;
}

function formulario($idCancion) {
    $html = '';
    $song = song::buscaSongId($idCancion);
    if (!isset($_POST['Eliminar'])) {
        if ($_SESSION['idUser'] == $song->getIdUser()) {
            $html .= '<form method="POST" action="vistaCancion.php?id='.$song->getId().'">';
            $html .= '<input type = "submit" name="Eliminar" value = "Eliminar" >';
            $html .= '</form>';
        }
    }
    else  $song->eliminar();
    return $html;
}

function anadirAplaylist($idCancion){
    $html = '';
    $song = song::buscaSongId($idCancion);
    if (!isset($_POST['Anadir a Playlist'])) {
        if ($_SESSION['idUser'] == $song->getIdUser()) {
            $html .= '<form method="POST" action="VistaAnadirAPlaylist.php?id='.$song->getId().'">';
           $html .= '<input type = "submit" name="Anadir a playlist" value = "Anadir a playlist" >';
            $html .= '</form>';
			busqueda();	
        }
		
    }
	
	else busqueda();
    return $html;

}
function muestraComentarios($idCancion) {
    $foroCancion = songForum::buscaSongId($idCancion);

    $listaComentarios = '';
		if($foroCancion != null)
		{
            $listaComentarios .= '<div>';
			foreach ($foroCancion as $or) {
				$listaComentarios .= '<div>'. $or->getIdUser().' </div><p>'.$or->getText().' </p>';
            }
            $listaComentarios .= '</div>';
        }
    return $listaComentarios;
    
}
function busqueda(){

    $html = "";
    if (isset($_POST['busqueda'])) require "includes/Busqueda.php";
    else $html .= "<p>Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.</p>";
    return $html;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-cancion.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Cancion</title>
</head>
<body>
<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <section id="contents" class="contents">
	    <header>
            <?php
		    $idCancion=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
            echo formulario($idCancion);
            ?>
        </header>

        <?php
		echo anadirAplaylist($idCancion);
        echo muestraCancion($idCancion);
		echo muestraComentarios($idCancion);
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>