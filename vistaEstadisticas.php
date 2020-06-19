<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\comentario as comentario;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}


function muestraReproduccionCanciones(){
$i = 0;
$user=$_SESSION['idUser'];
$songs = song::songsUser($user);
if($songs != null){
$reproducciones=" Reproducciones: ";
    echo '<div id="songs">';
    $listaCanciones = "<div class='listaCanciones'><ul>";
    echo '<h1>TUS CANCIONES</h1>';
    foreach ($songs as $row) {
	
        $listaCanciones .= "<li class='tracklistRow'><span class='boton'><button class='foot' id='playpause" .$row->getId(). "'  onclick='setTrack(null,\"" . $row->getId() . "\",null)'><i class='fas fa-play-circle'></i></button></span>
                 <span class='icon'><i class='fas fa-music'></i></span><span class='cancion'><p class='titulo' onclick='openPage(\"vistaCancion.php?id=" .$row->getId() . "\")'>". $row->getTitle() ."".$reproducciones."".$row->getPlayed()."</p></span>
                 <span class='wave'><div id='waveform".$row->getId()."'></div></span>
                 <span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $row->getId() . "\")' href='server/songs/".$row->getId().".mp3' download='".$row->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
                 <span class='opciones'><i onclick='eliminarSong(\"".$row->getId()."\")' id='PlayList".$i."' class='fas fa-times'></i></span></li>";

		$i++;

    }
    echo $listaCanciones."</ul></div>";
    echo "</div>";
}
}

function muestraPlaylist(){

$i = 0;
$user=$_SESSION['idUser'];
$playlists = playlist::playlistsUser($user);
if($playlists != null){
    echo '<div id="playlists">';
    $listaPlaylist = "<div class='listaCanciones'><ul>";
    echo '<h1>TUS PLAYLISTS</h1>';
    foreach ($playlists as $row) {
        $listaPlaylist  .= "<li class='tracklistRow'><span class='boton'><button class='foot' id='playpause" .$row->getId(). "'  onclick='setTrack(\"" . $row->getId() . "\",$i,1)'><i class='fas fa-play-circle'></i></button></span>
                 <span class='icon'><i class='fas fa-music'></i></span><span class='cancion'><p class='titulo' onclick='openPage(\"vistaPlaylist.php?id=" .$row->getId() . "\")'>". $row->getTitle() ."</p></span>
                 <span class='wave'><div id='waveform".$row->getId()."'></div></span>
                 <span class='descargar'><a onclick='descargar(\"".$_SESSION['idUser']."\",\"" . $row->getId() . "\")' href='server/songs/".$row->getId().".mp3' download='".$row->getTitle()."'><i class='fas fa-cloud-download-alt'></i></a></span>
                 <span class='opciones'><i onclick='eliminarPlaylist(\"".$row->getId()."\")' id='PlayList".$i."' class='fas fa-times'></i></span></li>";
        $i++;

    }
    echo $listaPlaylist ."</ul></div>";
    echo "</div>";

}
}

function muestraNoticias(){
$i = 0;
$user=$_SESSION['idUser'];
$noticias = noticia::buscaNoticiaId($user);
if($noticias != null){
    echo '<div id="noticias">';
    //$listaNoticias = "<div class='listaNoticias'><ul>";
    echo '<h1>TUS NOTICIAS</h1>';
    foreach ($noticias as $row) {
	
	if($row->getAccepted()==0)
	$acc="  (Aun no ha sido aceptada)";
	else
	$acc="  (Aceptada)";
	
			echo '<div span class="texto"><h3>'. $row->getTitle().''.$acc.'</h3><p>' . $row->getTexto() . '</h3></span></p>';
			echo '</div>';
        $i++;

    }
	//echo $listaNoticias."</ul></div>";
    echo "</div>";
}

}

function muestraMeGustaComentarios(){
$i = 0;
$user=$_SESSION['idUser'];
$comentarios = comentario::buscaIdUser($user);
$acc="  Numero de Me Gustas: ";
if($comentarios != null){
    echo '<div id="comentarios">';
    echo '<h1>TUS Comentarios</h1>';
    foreach ($comentarios as $row) {	 
			echo '<div class="imagen">';
			echo '<div class="texto"><h3>'. $row->getText().'</h3><p>'.$acc.'' . $row->getMeGusta() .'</p>';
			echo '</div>';
        $i++;
    }
    echo "</ul></div>";
    echo "</div>";
}

}

function muestraSeguidores(){
$i = 0;
$user=$_SESSION['idUser'];
$seguidores = seguidor::buscaSeguidores($user);

 
if($seguidores != null){
    echo '<div id="songs">';
    $listaSeguidores = "<div class='listaCanciones'><ul>";
    echo '<h1>TUS Seguidores</h1>';
    foreach ($seguidores[$i] as $row) {		
		  echo '<div class="imagen">';
			echo '<div class="texto"><h3>'.$row->getIdSeguidor.'</h3>';
			echo '</div>';
		$i++;

    }
    echo listaSeguidores."</ul></div>";
    echo "</div>";
}

}

?>
 <section id="contentsEstadistica" class="contentsEstadistica">
           
        <?php
		
		//echo muestraUsuario();
		echo muestraReproduccionCanciones();
		echo muestraPlaylist();		
		echo muestraNoticias();		
		echo muestraMeGustaComentarios();

		
	//	echo muestraSeguidores();
	
        ?>
    </section>