<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;


 $idCancion=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

$playlists = playlist::playlistsUser($_SESSION['idUser']);
if ($playlists !== null) {
    echo '<h1>TUS PLAYLISTS</h1>';
    foreach ($playlists as $row) {
        echo "<div>";
        echo '<a href="includes/AnadeAPlaylist.php?id='.$row->getId().''. $idCancion.'">'.$row->getTitle().'</a>';
        echo "<img src='server/images/Colores.jpg'></div>";
    }
}
