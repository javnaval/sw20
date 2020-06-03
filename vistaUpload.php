<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\classes\classes\user as user;

    if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        header("Location: index.php");
    }
    $form = new es\ucm\fdi\aw\FormularioUpload();
    $html = $form->gestiona();

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
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <script type="text/javascript" src="includes/js/upload.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
    <script type="text/javascript" src="includes/js/history.js"></script>
    <title>Upload</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <?php
    require 'includes/handlers/header.php';
    ?>

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
