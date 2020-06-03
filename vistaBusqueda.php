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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <script type="text/javascript" src="includes/js/seguidores.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
    <script type="text/javascript" src="includes/js/history.js"></script>
    <title>Busqueda</title>
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
        <header>
            <?php
            echo generaCamposFormulario($_POST);
            ?>
        </header>
        <?php
        echo busqueda();
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>
