<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;

    if (es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        $album = album::buscaAlbumId($_GET["id"]);
        $songs = song::buscaSongsIdAlbum($_GET["id"]);
        $albumArtist= user::buscaUsuarioId($album->getIdArtist())->getName();
        $albumTitle = $album->getTitle();
        $albumId = $album->getId();
        $albumIdArtist = $album->getIdArtist();
        $albumReleaseDate = $album->getReleaseDate();
        $listaCanciones = "<div class='listaCanciones'><ul>";
        $i = 0;
		 if($songs != null){
			 foreach ($songs as $row) {   
                 $menu = menu($_SESSION['idUser'],$row->getId(),$i);    
                 $listaCanciones .= "<li class='tracklistRow'><span class='boton'><button id='playpause" .$row->getId(). "'  onclick='setTrack(\"" . $albumId . "\",$i,1)'><i class='fas fa-play-circle'></i></button></span>
                 <span class='icon'><i class='fas fa-music'></i></span><span class='cancion'><p class='titulo' onclick='openPage(\"vistaCancion.php?id=" .$row->getId() . "\")'>". $row->getTitle() ."</p><p class='nombre'>" .$albumArtist."</p></span>
                 <span class='wave'><div id='waveform".$row->getId()."'></div></span>
                 <span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $row->getId() . "\")' href='server/songs/".$row->getId().".mp3' download='".$row->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
                 <span class='opciones'><i onclick='mostrarPlaylist(\"".$i."\")' id='PlayList".$i."' class='fas fa-stream'></i></span>$menu</li>";
                 $i++;
                 
			 }
		 }
         $listaCanciones .= "</ul></div>";
		
    }
    else {
        header("Location: index.php");
    }

    function viewAlbumInfo($albumId, $albumArtist, $albumTitle, $albumIdArtist,$albumReleaseDate) {
        echo "<div class='cabeceraAlbums'><img src= 'server/albums/images/" . $albumId . ".png'>";
        echo "<span><p class='tipo'> ÁLBUM </p><p class='tituloAlbums'>" . $albumTitle . "</p>";
        echo "<span><img src= 'server/users/images/" . $albumIdArtist . ".png'><p class='cantenteGrupo' onclick='openPage(\"vistaUsuario.php?id=" .$albumIdArtist . "\")'> ". $albumArtist . "</p>";
        echo "<p class='fecha'>" . $albumReleaseDate . "</p></span></span></div>";
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
    <section id="contentsAlbums" class="contentsAlbums">
        <?php
        viewAlbumInfo($albumId, $albumArtist, $albumTitle, $albumIdArtist,$albumReleaseDate,$_SESSION['idUser']);
        echo $listaCanciones;
        ?>
    </section>
    <script>
    if(!song.paused) {
      var existe = '#playpause' + songId;
      var playId = 'playpause' + songId;
      if($(existe).length > 0) {
         document.getElementById(playId).innerHTML = '<i class="fas fa-stop-circle"></i>';
       }
         crearSpectro(<?php echo $idCancion ?>);
		 wavesurfer.load(song.src);
     }
     var ids = '<?php echo $i ?>';
            for(var i = 0; i < ids; i++){
                var nav = 'navPlayList' + i;
                document.getElementById(nav).style.display = 'none';
            }
    </script>
  

     
  