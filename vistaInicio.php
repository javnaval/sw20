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
        require 'cabeceraInicio.php';
        ?>
    </header>

    <nav>
        <?php
        require 'sidebarLeft.php';
        ?>
    </nav>

    <section id="inicio">
        <?php
        if (isset($_POST['busqueda'])) require 'vistaBusqueda.php';
        if (isset($_GET['upload'])) require 'vistaUpload.php';
        if (isset($_POST['archivo'])) require 'procesarUpload.php';
        ?>
    </section>

    <footer>
        <?php
        require 'pie.php';
        ?>
    </footer>

</body>
</html>