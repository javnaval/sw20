<?php
require_once '../config.php';

use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;


$idSong = htmlspecialchars(trim(strip_tags($_POST['idSong'])));
$idPlaylist = htmlspecialchars(trim(strip_tags($_POST['idPlaylist'])));
$existe = (new Relations("contiene"))->where("idSong", "=", $idSong)->where("idPlaylist", "=", $idPlaylist)->get();

if (!empty($existe)) {
    (new Relations("contiene"))->where("idSong", "=", $idSong)->where("idPlaylist", "=", $idPlaylist)->delete();
}