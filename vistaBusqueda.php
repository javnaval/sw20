<?php
require_once 'includes/config.php';
require_once 'includes/FormularioBusqueda.php';
if (!Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function busqueda(){
    $form = new FormularioBusqueda();
    $html = $form->gestiona();
    if (!isset($_POST['busqueda'])) $html .= "<p>Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.</p>";
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
