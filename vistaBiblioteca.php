<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

?>

    <section id="contentsBiblioteca" class="contentsBiblioteca">
        <div class='cabeceraBiblioteca'>
        <span><p class='tituloBiblioteca'>Biblioteca</p></span></div>
        <div id="crearPlaylist">
            <form>
                <input type="text" id="tituloPlaylist" placeholder="TituloPlaylist">
                <a onclick="crearPlaylist()" >Crear</a>
            </form>
        </div>
        <a id="pl" onClick="muestra('crearPlaylist', 'tituloPlaylist');oculta('pl')">Crear playlist</a>
        <?php
        require 'includes/Biblioteca.php';
        ?>
    </section>
