<?php
    require_once 'includes/config.php';
    require_once 'includes/FormularioSignIn.php';
    if (Application::getSingleton()->usuarioLogueado()) {
        header("Location: vistaInicio.php");
    }
    else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <header id="index">
        <?php
        require 'includes/handlers/cabecera.php';
        ?>
    </header>

    <section id="log">
        <?php
        $form = new FormularioSignIn();
        echo $form->gestiona();
        ?>
    </section>


</body>
<?php } ?>
</html>
