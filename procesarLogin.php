<?php
require_once("DAOUsuario.php");
require_once("config.php");

assert(is_string($_POST['user']) && is_string($_POST['pass']), "Error al introducir los datos");
$usuario = htmlspecialchars(trim(strip_tags($_POST['user'])));
$contrasenia = htmlspecialchars(trim(strip_tags($_POST['pass'])));
$dao = new DAOUsuario();

if (!isset($_SESSION['login'])) {
    if ($_GET['log']) {
        $user = $dao->buscar($usuario);
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
            if ($dao->insertar($user)) require('vistaInicio.php');
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
else echo "holaaa caracola";
