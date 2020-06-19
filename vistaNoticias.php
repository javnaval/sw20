<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

?>

    <section id="contents" class="contentsNoticia">
        <?php
        require 'includes/Noticias.php';
        ?>
    </section>
