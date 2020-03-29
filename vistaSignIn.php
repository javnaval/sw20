<?php
    require_once 'includes/config.php';
    require_once 'includes/FormularioSignIn.php';
    if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
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
        $form->gestiona();
        ?>
    </section>

    <footer>
        <?php
        require 'includes/handlers/pie.php';
        ?>
    </footer>

</body>
<?php } ?>
</html>
