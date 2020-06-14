<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(!strcmp($usuario->getRol(), "premium") === 0){
     $numero[0] = rand(0,10);
     echo $numero[0];
}