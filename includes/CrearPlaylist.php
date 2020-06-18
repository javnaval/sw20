<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
require_once 'config.php';

$idUser = $_SESSION['idUser'];

assert(is_string($_POST['tituloPLaylist']), "Error al introducir los datos");
$tituloPlaylist = htmlspecialchars(trim(strip_tags($_POST['tituloPLaylist'])));

if(playlist::buscaTitlePlaylistUser($idUser, $tituloPlaylist) == null){
    playlist::crea($idUser, $tituloPlaylist);
}

$i = 0;
$playlists = playlist::playlistsUser($_SESSION['idUser']);
$listaPlaylist = "<div class='listaCanciones'><ul>";
echo '<h1>TUS PLAYLISTS</h1>';
foreach ($playlists as $row) {
    $listaPlaylist  .= "<li class='tracklistRow'><span class='boton'><button class='foot' id='playpause" .$row->getId(). "'  onclick='setTrack(\"" . $row->getId() . "\",$i, null)'><i class='fas fa-play-circle'></i></button></span>
                 <span class='icon'><i class='fas fa-music'></i></span><span class='cancion'><p class='titulo' onclick='openPage(\"vistaPlaylist.php?id=" .$row->getId() . "\")'>". $row->getTitle() ."</p></span>
                 <span class='wave'><div id='waveform".$row->getId()."'></div></span>
                 <span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $row->getId() . "\")' href='server/songs/".$row->getId().".mp3' download='".$row->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
                 <span class='opciones'><i onclick='eliminarPlaylist(\"".$row->getId()."\")' id='PlayList".$i."' class='fas fa-times'></i></span></li>";
    $i++;

}
echo $listaPlaylist ."</ul></div>";