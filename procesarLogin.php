<?php
session_start();
$usuario = new claseUsuario($_POST['user'], $_POST['pass']);
if (!isset($_SESSION)){

    if ($user == "user") {
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = "Juan";
    } else {
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = "Administrador";
        $_SESSION['esAdmin'] = true;
    };
}
require('inicio.php');