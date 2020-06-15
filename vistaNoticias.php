<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioAprobarNoticia();
$html = $form->gestiona();

function gestor(){ return user::esGestor($_SESSION['idUser']); }


?>

    <section id="contents" class="contentsNoticia">
        <?php
        if (!gestor()) require 'includes/Noticias.php';
		else echo $html;
        ?>
    </section>
