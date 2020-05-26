<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}

function formulario() {
    $form = new es\ucm\fdi\aw\FormularioPlaylist();
    $html = $form->gestiona();
    $html = '';
    if (!isset($_POST['Crear Playlist'])) {
            $html .= '<form method="POST" action="VistaCreaPlaylist.php">';
            $html .= '<input type = "submit" name="Crear Playlist" value = "Crear Playlist" >';
            $html .= '</form>';
    }
    //else $song->eliminar();
	else echo "sgd";
    return $html;
}
function anadirAplaylist() {
  $html = '';
    //$song = song::buscaSongId($idCancion);
    if (!isset($_POST['Anade a Playlist'])) {
       // if ($_SESSION['idUser'] == $song->getIdUser()) {
            $html .= '<form method="POST" action="includes/FormularioPlaylist.php">';
            $html .= '<input type = "submit" name="Anade a Playlist" value = "AnadirAplaylist " >';
            $html .= '</form>';
        //}
    }
    //else $song->eliminar();
	else echo "sgd";
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
    <title>Biblioteca</title>
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
            echo formulario();
			//echo AnadirAplaylist();
            ?>
        <?php
        require 'includes/Biblioteca.php';
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>