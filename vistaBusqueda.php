<?php
require_once 'includes/config.php';

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
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
    <title>Busqueda</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        require 'includes/handlers/sidebarLeft.php';
        ?>
    </nav>

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

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>

</body>
</html>
