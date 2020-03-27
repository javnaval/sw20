<?php
require_once "config.php";
require_once dirname(__DIR__)."/classes/classes/user.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Users.php";

assert(is_string($_POST['user']) && is_string($_POST['pass']), "Error al introducir los datos");
$usuario = htmlspecialchars(trim(strip_tags($_POST['user'])));
$contrasenia = htmlspecialchars(trim(strip_tags($_POST['pass'])));

if (!isset($_SESSION['login'])) {
    if ($_GET['log']) {
        $user = (new Users())->where("user", "=", $usuario)->get();
        if ($user != null && $user[0]->getPassword() == $contrasenia) {
            $_SESSION['login'] = true;
            $_SESSION['idUser'] = $user[0]->getId();
            header("Location: ../vistaInicio.php");
        }
        else {
            header("Location: ../vistaLogin.php?error=true&user=$usuario");
        }
    }
    else {
        assert(is_string($_POST['email']) && is_string($_POST['pass2']), "Error al introducir los datos");
        $email = htmlspecialchars(trim(strip_tags($_POST['email'])));
        $contrasenia2 = htmlspecialchars(trim(strip_tags($_POST['pass2'])));

        if ($contrasenia == $contrasenia2) {
            try {
                $idUser = (new Users())->insert(new user(null, $usuario, null, null, null, $email, $contrasenia));
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
}
else header("Location: ../vistaLogin.php");
