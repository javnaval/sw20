<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;
use es\ucm\fdi\aw\classes\databaseClasses\Songs;

$albumPlayListId =  htmlspecialchars(trim(strip_tags($_POST['albumPlayListId'])));

$songs = song::buscaSongIdPlaylist($albumPlayListId);

     foreach($songs as $row){
      $arrayAux = $row->toString();
      $arrayAux["id"] = $row->getId();
      $arrayAux["played"] = 0;
      $songsArray[] = $arrayAux;

     }

     echo json_encode($songsArray);
?>