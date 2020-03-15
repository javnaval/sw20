<?php
require_once "config.php";
require_once "claseUsuario.php";

assert(is_string($_POST['user']) && is_string($_POST['pass']), "Error al introducir los datos");
$usuario = htmlspecialchars(trim(strip_tags($_POST['user'])));
$contrasenia = htmlspecialchars(trim(strip_tags($_POST['pass'])));

if (!isset($_SESSION['login'])) {
    if ($_GET['log']) {
        $user = new claseUsuario($usuario);
        $user->buscar();
        if ($user != null && $user->getPassword() == $contrasenia) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user->getUser();
            require('vistaInicio.php');
        }
        else {
            $_GET['error'] = true;
            require("vistaLogin.php");
        }
    }
    else {
        assert(is_string($_POST['email']) && is_string($_POST['pass2']), "Error al introducir los datos");
        $email = htmlspecialchars(trim(strip_tags($_POST['email'])));
        $contrasenia2 = htmlspecialchars(trim(strip_tags($_POST['pass2'])));

        if ($contrasenia == $contrasenia2) {
            $user = new claseUsuario($usuario, $contrasenia, $email);
            if ($user->insertar()) require('vistaInicio.php');
            else {
                $_GET['error'] = true;
                require("vistaSignIn.php");
            }
        }
        else {
            $_GET['error'] = true;
            require("vistaSignIn.php");
        }
    }
}
else require("vistaLogin.php");
