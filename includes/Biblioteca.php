<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;


$songs = song::songsUser($_SESSION['idUser']);
if ($songs !== null) {
    echo '<h1>TUS CANCIONES</h1>';
    foreach ($songs as $row) {
        echo "<div>";
        echo '<a href="vistaCancion.php?id='.$row->getId().'">'.$row->getTitle().'</a>';
        echo "<img src='server/images/Colores.jpg'></div>";
    }
}
			   
$playlists = playlist::playlistsUser($_SESSION['idUser']);
if ($playlists !== null) {
    echo '<h1>TUS PLAYLISTS</h1>';
    foreach ($playlists as $row) {
        echo "<div>";
        echo '<a href="vistaPlaylist.php?id='.$row->getId().'">'.$row->getTitle().'</a>';
        echo "<img src='server/images/Colores.jpg'></div>";
    }
}