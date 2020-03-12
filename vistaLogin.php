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
        <form action="procesarLogin.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <div id="s1">
                    <p><input type="text" name="user" placeholder="Usuario"></p>
                    <p><input type="password" name="pass" placeholder="Contraseña"></p>
                </div>
                <div id="s2">
                    <a href="vistaSignIn.php" placeholder="¿Aun no está registrado? Crear una cuenta">¿Aun no está registrado? Crear una cuenta</a>
                    <p><input type="submit" name="Iniciar sesión"></p>
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