<?php
require_once "config.php";
require_once dirname(__DIR__)."/classes/classes/user.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Users.php";

assert(is_string($_POST['user']) && is_string($_POST['pass']) && is_string($_POST['email']) && is_string($_POST['pass2']), "Error al introducir los datos");
$usuario = htmlspecialchars(trim(strip_tags($_POST['user'])));
$contrasenia = htmlspecialchars(trim(strip_tags($_POST['pass'])));
$email = htmlspecialchars(trim(strip_tags($_POST['email'])));
$contrasenia2 = htmlspecialchars(trim(strip_tags($_POST['pass2'])));

if (!isset($_SESSION['login'])) {
    if ($contrasenia == $contrasenia2) {
        try {
            $idUser = user::crea($usuario, $email, $contrasenia);
            $_SESSION['login'] = true;
            $_SESSION['idUser'] = $idUser;
            header("Location: ../vistaInicio.php");
        }
        catch (Exception $exc) {
            header("Location: ../vistaSignIn.php?error=true&user=$usuario&email=$email");
        }
    }
    else {
        header("Location: ../vistaSignIn.php?error=true&user=$usuario&email=$email");
    }
}
else header("Location: ../vistaLogin.php");
