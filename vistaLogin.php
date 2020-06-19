<?php
    require_once 'includes/config.php';

    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        header("Location: vistaInicio.php");
    }
    $form = new es\ucm\fdi\aw\FormularioLogin();
    $html = $form->gestiona();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <header>
        <?php
        require 'includes/handlers/cabecera.php';
        ?>
    </header>

    <section id="log">
        <?php
         echo $html;
        ?>
    </section>

</body>
</html>