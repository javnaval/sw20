<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$bloquearUsuario = htmlspecialchars(trim(strip_tags($_POST['bloquearUsuario'])));
$user = user::buscaUsuarioId($id);
if ($bloquearUsuario == 'true')
{
	$user->bloquear();
}

else 
{
	$user->desbloquear();
}