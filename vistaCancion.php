<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php"); 
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\forum as forum;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;



if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$idCancion = htmlspecialchars(trim(strip_tags($_GET["id"])));

$foroInicial = forum::buscaForosIdSongTitulo($_GET["id"],"Comentarios");

$foroid= $foroInicial->getId();


function muestraCancion($idCancion,$foroid){
    $html = "";
	$song = song::buscaSongId($idCancion);
	$menu = menu($_SESSION['idUser'],$song->getId(),0); 
    if ($song !== null) {
        $html .= "<div class='cancion' ><div class='card'>";  
        $html .= "<figure><img src='images/Colores.jpg'>";   
        $html .= "<figcaption>" . $song->getTitle() . "<figcaption>";
        $html .= "<button id='playpause" .$song->getId(). "'  onclick='setTrack(null,\"" . $song->getId() . "\",null)'><i class='fas fa-play-circle'></i></button></div>";
		$html .= "<span class='wave'><div id='waveform".$song->getId()."'></div></span>
		<span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $song->getId() . "\")' href='server/songs/".$song->getId().".mp3' download='".$song->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
		<span class='refrescar'><i onclick='refrescar(\"".$idCancion."\",\"".$foroid."\")' class='fas fa-redo-alt'></i></span>
		<span class='opciones'><i onclick='mostrarPlaylist(0)' id='PlayList0' class='fas fa-stream'></i></span>$menu</div>";
	}
	return $html;
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

echo "<script>mostrarComentarios('$idCancion','$foroid');</script>"; 
echo "<script>mostrarForos('$idCancion');</script>"; 

?>
    <section id="contentsCancion" class="contentsCancion">
      <?php echo muestraCancion($idCancion,$foroid); ?>
     <div id="comentariosForos" class="comentariosForos">
		 <div id="comentariosTexto" class="comentariosTexto">
			 <div id="recargar" class="recargar">
			 </div>
		     <div id="textComentario" class="textComentario">
		     </div>
	     </div>
		 <div class="foros">
			 <div id="foro" class="foro">
			 </div>
		   <div id="textoForo" class="textoForo">
		   </div>	
		 </div>
	 </div>	
	</section>
	
	<script>
	if(!song.paused) {
         var existe = '#playpause' + songId;
         var playId = 'playpause' + songId;
         if($(existe).length > 0 ) {
             document.getElementById(playId).innerHTML = '<i class="fas fa-stop-circle"></i>';
		  }
	 }
		  var direc = directionSONG + <?php echo $idCancion ?> + '.mp3';
		  crearSpectro( <?php echo $idCancion ?>); 
		  wavesurfer.load(direc);
         var nav = 'navPlayList0';
         document.getElementById(nav).style.display = 'none';
    </script>