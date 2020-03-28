<?php
require_once "config.php";
require_once dirname(__DIR__)."/classes/classes/user.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Users.php";

assert(is_string($_POST['user']) && is_string($_POST['pass']), "Error al introducir los datos");
$usuario = htmlspecialchars(trim(strip_tags($_POST['user'])));
$contrasenia = htmlspecialchars(trim(strip_tags($_POST['pass'])));

if (!isset($_SESSION['login'])) {
    $user = user::login($usuario, $contrasenia);
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['idUser'] = $user->getId();
        header("Location: ../vistaInicio.php");
    }
    else {
        header("Location: ../vistaLogin.php?error=true&user=$usuario");
    }
}
else header("Location: ../vistaLogin.php");
