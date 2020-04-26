<?php
require_once 'includes/config.php';
require_once "classes/classes/album.php";
require_once "classes/databaseClasses/Albums.php";
if (!Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function mostrar(){
    $html = "";
    $albums = (new Albums())->get();
    foreach ($albums as $row) {
        $html .= "<div>";
        $html .= $row->getTitle();
        $html .= "<img src='server/images/Colores.jpg'></div>";
    }
    return $html;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
    <title>Sounday</title>
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
        echo mostrar();
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
