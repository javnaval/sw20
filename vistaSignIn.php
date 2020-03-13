<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<div id="contenedor">
    <div id="cabecera">
        <?php
        require('cabecera.php');
        ?>
    </div>

    <div id="contenido">
        <form action="procesarLogin.php?log=0" method="post">
            <fieldset>
                <legend>Sign In</legend>
                <div id="s1">
                    <?php
                        if (isset($_POST['email'])) {
                            echo "<p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\" value=".$_POST['email']."></p>";
                        }
                        else echo " <p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\"></p>";
                        if (isset($_POST['user'])) {
                            echo "<p><input type=\"text\" name=\"user\" value=".$_POST['user']." placeholder=\"Usuario\"></p>";
                        }
                        else echo "<p><input type=\"text\" name=\"user\" placeholder=\"Usuario\"></p>";
                    ?>
                    <p><input type="password" name="pass" placeholder="Contraseña"></p>
                    <p><input type="password" name="pass2" placeholder="Repetir contraseña"></p>
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
    </div>

    <div id="pie">
        <?php
        require('pie.php');
        ?>
    </div>
</div>

</body>
</html>
