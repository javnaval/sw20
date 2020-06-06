
<?php
require_once 'includes/config.php';

use es\ucm\fdi\aw\classes\classes\contiene as contiene;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\song as song;
use \es\ucm\fdi\aw\classes\classes\playlist as playlist;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}
function muestraPlaylist($idPlaylist){
    $playlist = playlist::buscaPlaylistId($idPlaylist);
    $songs = contiene::songs($idPlaylist);
    $html = '<h1>'.$playlist->getTitle().'</h1>';
    if ($songs !== null) {
        foreach ($songs as $row) {
            $song = song::buscaSongId($row[0]);
            $html .= '<p><a href="vistaCancion.php?id='. $song->getId().'" >'. $song->getTitle().' </a></p>';
        }
        if (isset($songs[0]) && $songs[0] == null) $html .= 'Su playlist esta vacia';
    } else $html .= 'Su playlist esta vacia';

    return $html;
}
function formulario($idPlaylist) {
    $html = '';
    $playlist = playlist::buscaPlaylistId($idPlaylist);
	$contiene=playlist::buscaPlaylistId($idPlaylist);
    if (!isset($_POST['Eliminar'])) {
        if ($_SESSION['idUser'] == $playlist->getIdUser()) {
		
            $html .= '<form method="POST" action="vistaPlaylist.php?id='.$playlist->getId().'">';
            $html .= '<input type = "submit" name="Eliminar" value = "Eliminar" >';
            $html .= '</form>';
        }
    }

    else 	{
	$playlist->eliminar();	
	$contiene->eliminar();
     //require 'inludes/biblioteca.php';
	}
    return $html;
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
    <link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
    <script type="text/javascript" src="includes/js/history.js"></script>
    <title>Playlist</title>
</head>
<body>
<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <?php
    require 'includes/handlers/header.php';
    ?>

    <section id="contents" class="contents">
        <?php
		$idPlaylist = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
		 echo muestraPlaylist($idPlaylist);
		 echo formulario($idPlaylist);
       // echo muestraPlaylist($idPlaylist);
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>