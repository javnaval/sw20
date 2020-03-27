<?php
    require_once __DIR__ . '/includes/config.php';
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
        <form action="includes/procesarLogin.php?log=0" method="post">
            <fieldset>
                <legend>Sign In</legend>
                <div id="s1">
                    <?php
                        if (isset($_GET['email'])) {
                            echo "<p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\" value=".$_GET['email']." required></p>";
                        }
                        else echo " <p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\" required></p>";
                        if (isset($_GET['user'])) {
                            echo "<p><input type=\"text\" name=\"user\" value=".$_GET['user']." placeholder=\"Usuario\" required></p>";
                        }
                        else echo "<p><input type=\"text\" name=\"user\" placeholder=\"Usuario\" required></p>";
                    ?>
                    <p><input type="password" name="pass" placeholder="Contraseña" required></p>
                    <p><input type="password" name="pass2" placeholder="Repetir contraseña" required></p>
                </div>
                <?php
                    if (isset($_GET['error']) && $_GET['error'] == true) {
                        echo "<p id='error'>Usuario o contraseña no válidos.</p>";
                    }
                ?>
                <div id="s3">
                    <a href="vistaLogin.php" placeholder="¿Ya tienes cuenta? Iniciar sesión">¿Ya tienes cuenta? Iniciar sesión</a>
                    <p><input type="submit" name="Registrarse" value="Registrarse"></p>
                </div>
            </fieldset>
        </form>
    </section>

    <footer>
        <?php
        require 'includes/handlers/pie.php';
        ?>
    </footer>

</body>
<?php } ?>
</html>
