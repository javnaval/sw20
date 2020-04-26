<?php
require_once 'includes/config.php';
if (!Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function busqueda(){
    $html = "";
    if (isset($_POST['busqueda'])){
        require 'includes/procesarBusqueda.php';
    }
    else $html = "Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.";
    return $html;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
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
            <form action = "vistaBusqueda.php" method = "post" >
                <input type = "search" name = "busqueda" placeholder = "Buscar artistas, canciones o álbumes" >
                <input type = "submit" name = "Buscar" value = "Buscar" >
            </form >
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
