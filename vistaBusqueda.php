<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}

function busqueda(){
    $html = "";
    if (isset($_POST['busqueda'])) require "includes/Busqueda.php";
    else $html .= "<p>Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.</p>";
    return $html;
}

function generaCamposFormulario($datosIniciales) {
    $html = '<form method="POST" action="vistaBusqueda.php">';
    if (isset($datosIniciales['busqueda'])) {
        $html .= '<input type = "search" name = "busqueda" value="'.$datosIniciales['busqueda'].'" placeholder = "Buscar artistas, canciones o álbumes" >';
    }
    else $html.= '<input type = "search" name = "busqueda" placeholder = "Buscar artistas, canciones o álbumes" >';
    $html .= '<input type = "submit" name = "Buscar" value = "Buscar" >';
    $html .= '</form>';
    return $html;
}

?>


    <section id="contents" class="contents">
        <header>
            <?php
            echo generaCamposFormulario($_POST);
            ?>
        </header>
        <?php
        echo busqueda();
        ?>
    </section>
