<?php
    require_once 'includes/config.php';
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
        <form action="includes/procesarLogin.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <div id="s1">
                    <?php
                        if (isset($_GET['user'])) {
                            echo "<p><input type=\"text\" name=\"user\" value=".$_GET['user']." placeholder=\"Usuario\" required></p>";
                        }
                        else echo "<p><input type=\"text\" name=\"user\" placeholder=\"Usuario\" required></p>";
                    ?>
                    <p><input type="password" name="pass" placeholder="Contraseña" required></p>
                </div>
                <?php
                    if (isset($_GET['error']) && $_GET['error'] == true) {
                        echo "<p id='error'>Usuario o contraseña incorrecto.</p>";
                    }
                ?>
                <div id="s2">
                    <a href="vistaSignIn.php" placeholder="¿Aun no está registrado? Crear una cuenta">¿Aun no está registrado? Crear una cuenta</a>
                    <p><input type="submit" name="Iniciar sesión" value="Iniciar sesión"></p>
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
</html>