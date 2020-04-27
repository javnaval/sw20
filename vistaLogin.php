<?php
    require_once 'includes/config.php';
    require_once 'includes/FormularioLogin.php';
    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        header("Location: vistaInicio.php");
    }
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
        $form = new es\ucm\fdi\aw\FormularioLogin();
         echo $form->gestiona();
        ?>
    </section>

</body>
</html>