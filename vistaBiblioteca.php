<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioPlaylist();
$html = $form->gestiona();

function formulario($form) {
    $html = $form;
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


    <section id="contents" class="contents">
		    <header>
            <?php
            echo formulario($html);
			//echo AnadirAplaylist();
            ?>
        <?php
        require 'includes/Biblioteca.php';
        ?>
    </section>
