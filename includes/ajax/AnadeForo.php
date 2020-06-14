<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\foro as foro;
use es\ucm\fdi\aw\classes\classes\user as user;


$titulo = htmlspecialchars(trim(strip_tags($_POST['titulo'])));
$idCancion = htmlspecialchars(trim(strip_tags($_POST['idCancion'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(strcmp($usuario->getRol(), "premium") === 0){
   if((strcasecmp($titulo,"comentario") !== 0) && (strcasecmp($titulo,"comentarios") !== 0)){
      foro::crea($idCancion, $titulo);
   }
}

