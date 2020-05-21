<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$solicitar = htmlspecialchars(trim(strip_tags($_POST['solicitar'])));
if ($solicitar == 'true')
{
	$user = user::buscaUsuarioId($id);
	$user->solicitar();
}

else 
{
	$user = user::buscaUsuarioId($id);
	$user->dejarSolicitar();
}