<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");

use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\song as song;
use \es\ucm\fdi\aw\classes\classes\playlist as playlist;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
    $playlist = playlist::buscaPlaylistId($_GET["id"]);
    $songs = song::buscaSongIdPlaylist($_GET["id"]);
    $userPlaylist = user::buscaUsuarioId($playlist->getIdUser());

    $listaCanciones = "<div class='listaCanciones'><ul>";
    $i = 0;
    if($songs != null){
        foreach ($songs as $row) {
            $user = user::buscaUsuarioId($row->getIdUser());
            $menu = menu($_SESSION['idUser'],$row->getId(),$i);
            $listaCanciones .= "<li class='tracklistRow'><span class='boton'><button id='playpause" .$row->getId(). "'  onclick='setTrack(\"" . $_GET["id"] . "\", $i,0)'><i class='fas fa-play-circle'></i></button></span><span class='icon'><i class='fas fa-music'></i></span><span class='cancion'><p class='titulo' onclick='openPage(\"vistaCancion.php?id=" .$row->getId() . "\")'>". $row->getTitle() ."</p><p class='nombre'>" .$user->getName()."</p></span>
            <span class='wave'><div id='waveform".$row->getId()."'></div></span><span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $row->getId() . "\")' href='server/songs/".$row->getId().".mp3' download='".$row->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
            <span class='opciones'><i onclick='mostrarPlaylist(\"".$i."\")' id='PlayList".$i."' class='fas fa-stream'></i></span>$menu</li>";
            $i++;
        }
    }
    $listaCanciones .= "</ul></div>";

function viewPlayListInfo($playlist,$userPlaylist) {
    echo "<div class='cabeceraAlbums'><img src= 'server/users/images/" . $playlist->getIdUser() . ".png'>";
    echo "<span><p class='tipo'> PLAYLIST </p><p class='tituloAlbums'>" . $playlist->getTitle() . "</p>";
    echo "<span><img src= 'server/users/images/" . $playlist->getIdUser() . ".png'><p class='cantenteGrupo' onclick='openPage(\"vistaUsuario.php?id=" .$playlist->getIdUser() . "\")'> ". $userPlaylist->getName() . "</p>";
    echo "</span></span></div>";
}

function menu($idUser,$idSong,$iC){
    $html = "";
    $html .= "<ul id='navPlayList".$iC."' >";
    $playlists = playlist::playlistsUser($idUser);
    foreach($playlists as $play){
        $html .= "<li><p onclick='anadePlaylist(". $play->getId().",".$idSong.")'>".$play->getTitle()."</p>";
    }
    return $html .= "</ul></li>";
}

?>
    <section id="contentsPlaylist" class="contentsAlbums">
        <?php
        echo viewPlayListInfo($playlist, $userPlaylist);
        echo $listaCanciones;
        ?>
    </section>
    <script>
         var ids = '<?php echo $i ?>';
            for(var i = 0; i < ids; i++){
                var nav = 'navPlayList' + i;
                document.getElementById(nav).style.display = 'none';
            }
    </script>
