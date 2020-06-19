<?php
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

$idCancion = htmlspecialchars(trim(strip_tags($_POST['idCancion'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(strcmp($usuario->getRol(), "usuario") !== 0){
	$listaForos = "";
	$listaForos .= "<form> <textarea id='txtAreaForo' placeholder='Eres Premium, crea un foro ahora y discute.....' maxlength='20'></textarea>";
	$listaForos .= "<label onclick='anadeForo(\"".$idCancion."\")'><i class='far fa-paper-plane'></i></label></form>";	 
	echo $listaForos;
}
?>