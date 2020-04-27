<?php
require_once 'includes/config.php';
if (!Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function muestraBiblioteca(){
    $html = "";
        require 'includes/Biblioteca.php';
    return $html;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
    <title>Biblioteca</title>
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

            </form >
        </header>
        <?php
        echo muestraBiblioteca();
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