<?php
require_once 'includes/config.php';
//require_once  'classes/classes/song.php';

if (!Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
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

            </form >
        </header>
        <?php
		$var=$_GET['tituloc'];
		$idCancion=$_GET['id'];

		?>
		<?php
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