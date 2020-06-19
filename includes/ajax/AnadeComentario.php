<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\comentario as comentario;
use es\ucm\fdi\aw\classes\classes\user as user;


$idCancion = htmlspecialchars(trim(strip_tags($_POST['idCancion'])));
$texto = htmlspecialchars(trim(strip_tags($_POST['texto'])));
$idForo = htmlspecialchars(trim(strip_tags($_POST['idForo'])));
$idComentaio = htmlspecialchars(trim(strip_tags($_POST['idComentario'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);


if(strcmp($usuario->getRol(), "usuario") !== 0){
   echo $texto;
   comentario::crea($idCancion,$texto,$idComentaio,$idForo);
}


