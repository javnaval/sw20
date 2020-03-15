<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<div id="contenedor">

    <div id="cabeceraInicio">
        <?php
        require('cabeceraInicio.php');
        ?>
    </div>

    <div id="sidebarLeft">
        <?php
        require('sidebarLeft.php');
        ?>
    </div>

    <div id="contenidoInicio">
        <?php
        if (isset($_GET['canciones'])){
            $canciones = $_GET['canciones'];
            echo "<h1>CANCIONES</h1>";
            foreach ($canciones as $cancion) {
                echo '<h3>'.$cancion->getCancion().'</h3><p>Artista: '.$cancion->getArtista().'</p><p>Album: '.$cancion->getAlbum().'</p>';
                echo '<audio src="'.$cancion->getRuta().'" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
            }
        }
        ?>
    </div>

    <div id="pie">
        <?php
        require('pie.php');
        ?>
    </div>

</body>
</html>