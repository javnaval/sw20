<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <header id="inicio">
        <?php
        require('cabeceraInicio.php');
        ?>
    </header>

    <nav>
        <?php
        require('sidebarLeft.php');
        ?>
    </nav>

    <section id="inicio">
        <?php
        if (isset($_GET['canciones'])){
            $canciones = $_GET['canciones'];
            echo "<h1>CANCIONES</h1>";
            foreach ($canciones as $cancion) {
                echo '<h3>'.$cancion->getCancion().'</h3><p>Artista: '.$cancion->getArtista().'</p><p>Album: '.$cancion->getAlbum().'</p>';
                echo '<audio src="'.$cancion->getRuta().'" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
            }
        }
        if (isset($_GET['artistas'])){
            $artistas = $_GET['artistas'];
            echo "<h1>ARTISTAS</h1>";
            foreach ($artistas as $artista) {
                echo '<h3>'.$artista->getArtista().'</h3><p>Género: '.$artista->getGenero().'</p><p>Descripcion: '.$artista->getDescripcion().'</p>';
            }
        }
        ?>
    </section>

    <footer>
        <?php
        require('pie.php');
        ?>
    </footer>

</body>
</html>