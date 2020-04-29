<?php
//namespace es\ucm\fdi\aw;
require_once 'includes/config.php';
//use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
//require_once  'classes/classes/song.php';

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
  //  header("Location: index.php");
}

function muestraCancion($var,$idCancion){
    $html = "";
        //require 'includes/procesarBusqueda.php';
	echo $var;

	echo '<audio src="server/songs/' . $idCancion  . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
	echo "<img src='server/images/Colores.jpg'>";
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
        <?php
		//$var=$_GET['tituloc'];
		$var=filter_input(INPUT_GET,'tituloc',FILTER_SANITIZE_STRING);
		$idCancion=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
		//$idCancion=$_GET['id'];
		
        echo muestraCancion($var,$idCancion);
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