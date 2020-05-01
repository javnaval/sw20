<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\classes\song as song;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function muestraCancion($song){
    $html = "";
    if ($song !== null) {
        $html .= $song->getTitle();
        $html .= '<audio src="server/songs/' . $song->getId() . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
        $html .= "<img src='server/images/Colores.jpg'>";
    }

    return $html;
}

function formulario($song) {
    $html = '';
    if ($_SESSION['idUser'] == $song->getIdUser()) {
        $html .= '<form method="POST" action="vistaCancion.php">';
        $html .= '<input type = "submit"  value = "Eliminar" >';
        $html .= '</form>';
        if (isset($_POST['Eliminar'])) $song->eliminar();
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
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Cancion</title>
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
		    $idCancion=filter_input(INPUT_GET,'idSong',FILTER_SANITIZE_NUMBER_INT);
            $song = song::buscaSongId($idCancion);
            echo formulario($song);
            ?>
        </header>

        <?php
        echo muestraCancion($song);
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