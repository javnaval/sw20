<?php
    require_once 'includes/config.php';
    require_once 'includes/FormularioLogin.php';
    if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
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
        $form = new FormularioLogin();
        $form->gestiona();
        ?>
    </section>

    <footer>
        <?php
        require 'includes/handlers/pie.php';
        ?>
    </footer>

</body>
</html>