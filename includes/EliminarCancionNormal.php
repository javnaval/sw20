<?php
namespace es\ucm\fdi\aw;
use \es\ucm\fdi\aw\classes\classes\song as song;
require_once 'config.php';

$idSong=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
//$idCancion=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
echo"sfgdsgs";
echo $idSong;
$song = song::buscaSongId($idSong);
$song->eliminar();