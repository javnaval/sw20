<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function mostrar($albumNombre){
    $html = "";          //where("name", "=", "albumNombre");
    $albums = album::albums();
    foreach ($albums as $row) {
        $html .= "<div>";                                                              //'server/images/'. $row->getName() .'.jpg';
        $html .= "<a href='vistaAlbum.php?id="  .$row->getId() . " '><figure><img src='server/images/Colores.jpg'> </a>";
        $html .= "<figcaption>" . $row->getTitle() . "<figcaption></div>";
    }
    //Dejar de prueba para probar scroll y añadir volumen se quitara en la entrega final asi como todo lo comentado de las imagenes
    foreach ($albums as $row) {
        $html .= "<div>";                                                              //'server/images/'. $row->getName() .'.jpg';
        $html .= "<a href='vistaAlbum.php?id="  .$row->getId() . " '><figure><img src='server/images/Colores.jpg'> </a>";
        $html .= "<figcaption>" . $row->getTitle() . "<figcaption></div>";
    }
    foreach ($albums as $row) {
        $html .= "<div>";                                                              //'server/images/'. $row->getName() .'.jpg';
        $html .= "<a href='vistaAlbum.php?id="  .$row->getId() . " '><figure><img src='server/images/Colores.jpg'> </a>";
        $html .= "<figcaption>" . $row->getTitle() . "<figcaption></div>";
    }
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
    <link rel="stylesheet" type="text/css" href="css/styles-inicio.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Sounday</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <section id="contents" class="contents">
        <ul>
            <li><h2>Listas de éxitos</h2><?php echo mostrar("Listas de éxitos"); ?></li>
            <li><h2>Destacado</h2><?php echo mostrar("Destacado"); ?></li>
            <li><h2>Chill</h2><?php echo mostrar("Chill"); ?></li>
            <li><h2>De fiesta</h2><?php echo mostrar("De fiesta"); ?></li>
            <li><h2>Relax</h2><?php echo mostrar("Relax"); ?></li>
        </ul>
    </section>

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>


</div>

</body>
</html>
