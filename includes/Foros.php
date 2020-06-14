<?php
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\foro as foro;
use es\ucm\fdi\aw\classes\classes\user as user;

$idCancion = htmlspecialchars(trim(strip_tags($_GET['idCancion'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(strcmp($usuario->getRol(), "premium") === 0){
	$listaForos = "";
	$foros = foro::buscaForosIdSong($idCancion);
	$listaForos .= "<ul>";
	foreach($foros as $foro){
		$listaForos .= "<li onclick='mostrarComentarios(\"" . $idCancion . "\",\"" .$foro->getId() . "\")'><p>".$foro->getTitutlo()."</p></li>";
	}
	$listaForos .= "</ul>";	 
	echo $listaForos;
}
?>