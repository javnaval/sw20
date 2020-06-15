<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;
use es\ucm\fdi\aw\classes\databaseClasses\Songs;

	 $albumPlayListId = $_POST['albumPlayListId'];

	 $songs = song::buscaSongsIdAlbum($albumPlayListId);

	 foreach($songs as $row){
        $songsArray[] =  $row->toString();
     }

     echo json_encode($songsArray);
?>