<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php"); 
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\playlist;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
     header("Location: index.php");
 }

 function mostrar(){
    $html = "";    
    $albums = album::albums();
        foreach ($albums as $row){
        $html .= "<div class='swiper-slide'> <div class='card'>";   
        $html .= "<figure><img onclick='openPage(\"vistaAlbum.php?id=" .$row->getId() . "\")' src='server/albums/images/".$row->getId().".png'>";   
        $html .= "<figcaption>" . $row->getTitle() . "<figcaption>";
        $html .= "</div></div>";     
      }                                                   
    return $html;
 }
 function mostrarPlaylists($playlistNombre){
  $html = "";   
  $playlist = playlist::buscaTitlePlaylist("playlist1");
  $playListSongs  = song::buscaSongIdPlaylist($playlist->getId());
  $i = 0;
      foreach ($playListSongs as $row){
      $html .= "<div class='swiper-slide'> <div class='card'>";   
      $html .= "<figure><img onclick='openPage(\"vistaPlaylist.php?id=" .$playlist->getId() . "\")' src='server/albums/images/".$row->getIdAlbum().".png'>";   
      $html .= "<figcaption>" . $row->getTitle() . "<figcaption>";
      $html .= "<button id='playpause" .$row->getId(). "'  onclick='setTrack(\"" .$playlist->getId(). "\",$i,null)'><i class='fas fa-play-circle'></i></button></div></div>";     
      $i++;
    }                                                 
  return $html;
}
function mostrarSeguidores($albumNombre){
    $html = "";
    $siguiendo = \es\ucm\fdi\aw\classes\classes\seguidor::buscaSiguiendo($_SESSION['idUser']);
    foreach ($siguiendo as $user) {
        $row = user::buscaUsuarioId($user['idUser']);
        $html .= "<div class='swiper-slide'> <div class='card'>";   
        $html .= "<figure><img onclick='openPage(\"vistaUsuario.php?id=".$row->getId()."\")' src='images/Colores.jpg'>";   
        $html .= "<figcaption>".$row->getName()."<figcaption>";
        $html .= "</div></div>"; 
    }
    return $html;
}

?>
    <section id="contentsInicial" class="contentsInicial">
         <div class="row"> <h2>Listas de éxitos</h2> <div class="swiper-container"><div class="swiper-wrapper"><?php echo mostrarPlaylists("Listas de éxitos"); ?> </div> </div> </div>
         <div class="row"> <h2>Destacado</h2> <div class="swiper-container"><div class="swiper-wrapper"><?php echo mostrarPlaylists("Destacado"); ?> </div> </div> </div>
         <div class="row"> <h2>Novedades</h2> <div class="swiper-container"><div class="swiper-wrapper"><?php echo mostrarPlaylists("Novedades"); ?> </div> </div> </div>
         <div class="row"> <h2>Entre tus seguidores</h2> <div class="swiper-container"><div class="swiper-wrapper"><?php echo mostrarSeguidores("Entre tus seguidores"); ?> </div> </div> </div>
         <div class="row"> <h2>Albums</h2> <div class="swiper-container"><div class="swiper-wrapper"><?php echo  mostrar(); ?> </div> </div> </div>
     </section>


<script>
     if(!song.paused) {
      var existe = '#playpause' + songId;
      var playId = 'playpause' + songId;
      if($(existe).length > 0 ) {
            document.getElementById(playId).innerHTML = '<i class="fas fa-stop-circle"></i>';
          }
     }
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 30,
        stretch: 0,
        depth: 500,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
  
</html>
