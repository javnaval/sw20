<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\forum as forum;
use es\ucm\fdi\aw\classes\classes\user as user;


$titulo = htmlspecialchars(trim(strip_tags($_POST['titulo'])));
$idCancion = htmlspecialchars(trim(strip_tags($_POST['idCancion'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(strcmp($usuario->getRol(), "usuario") !== 0){
   if((strcasecmp($titulo,"comentario") !== 0) && (strcasecmp($titulo,"comentarios") !== 0)){
      forum::crea($idCancion, $titulo);
   }
}

