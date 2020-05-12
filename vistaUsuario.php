<?php
require_once 'includes/config.php';

use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioEditarPerfil();
$htmlform = $form->gestiona();

function muestraInteraccion($id,$form){
    $html = '';
    if ($id != $_SESSION['idUser']) {
        if (seguidor::siguiendo($_SESSION['idUser'], $id)) $html .= '<a class="siguiendo" id="' . $id . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\');actualizarSeguidores(\'' . $id . '\')" placeholder="Seguir">Siguiendo</a>';
        else $html .= '<a class="seguir" id="' . $id . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\');actualizarSeguidores(\'' . $id . '\')" placeholder="Seguir">Seguir</a>';
    }
    else {
        if (isset($_GET['editar'])) $html .= $form;
        else $html .= '<h1><a type="button" href="vistaUsuario.php?editar=true&id=' . $_SESSION['idUser'] . '">Editar</a></h1>';
    }
	$html .= "</div>";
    return $html;
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
    <link rel="stylesheet" type="text/css" href="css/styles-usuario.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <script type="text/javascript" src="includes/js/seguidores.js"></script>
    <title>Usuario</title>
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
        if (isset($_GET['id'])) {
            include 'includes/Usuario.php';
            echo muestraInteraccion(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), $htmlform);
        }
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