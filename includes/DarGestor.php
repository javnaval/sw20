<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$darGestor = htmlspecialchars(trim(strip_tags($_POST['darGestor'])));
$user = user::buscaUsuarioId($id);
if ($darGestor == 'true')
{
	$user->darGestor();
}

else 
{
	$user->quitarGestor();
}