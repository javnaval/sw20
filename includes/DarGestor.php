<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$darGestor = htmlspecialchars(trim(strip_tags($_POST['darGestor'])));
if ($darGestor == 'true')
{
	$user = user::buscaUsuarioId($id);
	$user->darGestor();
}

else 
{
	$user = user::buscaUsuarioId($id);
	$user->quitarGestor();
}