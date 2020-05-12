<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

if (!user::esGestor($_SESSION['idUser'])){
    header("Location: vistaInicio.php");
}

$form = new es\ucm\fdi\aw\FormularioVerificarArtista();
$html = $form->gestiona();
?>

    <!DOCTYPE html>
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-ver-artistas.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Verificar artistas</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        require 'includes/handlers/sidebarLeftGestor.php';
        ?>
    </nav>

    <section id="contents" class="contents">
        <?php
        echo $html;
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>
