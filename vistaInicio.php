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
            foreach ($canciones as $cancion) {
                echo $cancion->getCancion().' '.$cancion->getArtista().' '.$cancion->getAlbum();
                echo '<p>'.$cancion->getRuta().'</p>';
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