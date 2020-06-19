<?php
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\comentario as comentario;
use es\ucm\fdi\aw\classes\classes\user as user;


$idCancion = htmlspecialchars(trim(strip_tags($_POST['idCancion'])));
$idComentario = htmlspecialchars(trim(strip_tags($_POST['idComentario'])));
$idForo = htmlspecialchars(trim(strip_tags($_POST['idForo'])));



$usuario = user::buscaUsuarioId($_SESSION['idUser']);
$contesta = "Escribe un comentario......";
if($idComentario != 0){
	$userComentario = comentario::buscaComentariosId($idComentario);
	$user = user::buscaUsuarioId($userComentario->getIdUser());
	$contesta = "Contesta al comentario de ". $user->getName()."....";
}

if(strcmp($usuario->getRol(), "usuario") !== 0){
	 $listaComentario = "";
	 $listaComentario  = "<form> <textarea id='txtArea' placeholder='\"".$contesta."\"' maxlength='300'></textarea> ";
	 $listaComentario .= "<label  onclick='anadeComentario(\"".$idCancion."\",\"".$idComentario."\",\"".$idForo."\")'><i class='far fa-paper-plane'></i></label></form>";
	 echo  $listaComentario;
}
?>