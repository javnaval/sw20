<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\song as song;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));

$song = song::buscaSongId($id);
$song->eliminar();