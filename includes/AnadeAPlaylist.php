<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\contiene as contiene;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\databaseClasses\Contenidos as Contenidos;


 $idCancion=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
 $Playlist=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

(new Relations(“contiene”))->insert(["idCancion" => $idCancion,
               "IdPlaylist" => $Playlist]);