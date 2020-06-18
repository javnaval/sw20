<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;

require_once 'config.php';

$idUsuario = htmlspecialchars(trim(strip_tags($_POST['id'])));
	
    $user = user::buscaUsuarioId($idUsuario);
    $user->setRol('artista');
	$user->setSolicitado(0);
    $user->update($user);
