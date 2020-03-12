<?php
require("config.php");
$usuario = $_POST['user'];
$contrasenia = $_POST['pass'];

if (!isset($_SESSION)) {
    if (is_string($usuario)) {
        $user = $dao->buscar($usuario);
        if ($user->getPassword() == $contrasenia) {
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = "Juan";
        }
    }
}
require('inicio.php');