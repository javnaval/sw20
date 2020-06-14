 var song = new Audio();
 song.type = 'audio/mpeg';

 const directionAnuncios = "server/anuncios/1.mp3";
 const directionSONG = "server/songs/";
 const directionIMG = "server/albums/images/";
 const playpauseIDCONST = 'playpause';


 var track;
 var currenTrack = null;
 var songId = null;
 var numeroActual = null;
 var Albumid;

 var playpauseid;

 var muted = false;
 var currentSong = 0;
 var vol = 1;
 var randv = false;
 var retweetv = false;
 var anuncio = false;


 var guardarPosicion;
 var guardarCancion;
 var conta;
 var wavesurfer;

$(document).ready(function(){
    setInterval(function(){
        $.post("includes/ajax/Premium.php", function(data) {
            if(anuncio == false){
                if(data == 5){
                     anuncio = true;
                     directionAnuncios
                     guardarPosicion = song.currentTime;
                     guardarCancion = song.src;
                     song.src =  directionAnuncios;
                     song.pause;
                     playpause();
                }
            }
        });
    },10000);
});


 function crearSpectro(numero){
  conta = '#waveform' + numero;
    console.log(conta);
    wavesurfer = WaveSurfer.create({
        container: conta,
        waveColor: 'violet',
        height: 65,
        hideScrollbar: true,
        cursorWidth: 0,
        progressColor: 'violet'
     });
 }


 function setTrack(albumPlayListId,numero,albumOrPlaylist){
     if(!anuncio){
        var playId = 'playpause' + songId;
        var existe = '#playpause' + songId;
         var direction = "includes/JSON/PlayListJSON.php";
         if(albumPlayListId == null){
             currentSong = 0;
             if(songId == numero){
                playpause();
             }
             else{
                if ( $(conta).length > 0 ) {
                    wavesurfer.destroy();
                 }
                song.src = directionSONG + numero + ".mp3";
                songId = numero;
                playpause();
                crearSpectro(songId);
                wavesurfer.load(song.src);
             }
         }
         else{
            if(albumOrPlaylist == 1){
                direction = "includes/JSON/SongsJSON.php";
             }
             $.post(direction,{ albumPlayListId: albumPlayListId }, function(data) {
                 track = JSON.parse(data);
                 if(JSON.stringify(currenTrack) === JSON.stringify(track)){
                     if(numero != null && numero == currentSong){
                          playpause();
                     }
                     else if(numero != null && numero != currentSong){
                        song.pause;
                        if ( $(existe).length > 0 ) {
                            document.getElementById(playId).innerHTML = '<i class="fas fa-play-circle"></i>';
                            if ( $(conta).length > 0 ) {
                                 wavesurfer.destroy();
                              }
                          }
                        currentSong = numero;
                        song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
                        songId = currenTrack[currentSong].id;
                        playpause();
                        crearSpectro(songId);
                        wavesurfer.load(song.src);
                     }
                     else{
                        playpause();
                     }
                 }
                 else{
                     currenTrack = track;
                     Albumid = albumPlayListId;
                     playpauseid = playpauseIDCONST + Albumid;
                     song.pause;
                     if(numero != null && numero >= 0 && numero <= currenTrack.length){
                        if ( $(existe).length > 0 ) {
                            document.getElementById(playId).innerHTML = '<i class="fas fa-play-circle"></i>';
                            if ( $(conta).length > 0 ) {
                                wavesurfer.destroy();
                             }
                          }
                        currentSong = numero;
                     }
                     song.pause;
                     song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
                     songId = currenTrack[currentSong].id;
                     document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + track[currentSong].id  + '.png"></img>';
                     playpause();
                     crearSpectro(songId);
                     wavesurfer.load(song.src);
                 }
             });
    
         }
     }

 }

 function convertTime(seconds) {
	var min = Math.floor(seconds / 60);
	var sec = seconds  % 60; 
    min = (min < 10)? "0" + min : min;
    sec = (sec < 10)? "0" + sec : sec;
	return min + ":" + sec;
 }

 function skip(sk) {
     if(!anuncio){
        var bool = song.paused;
        if (!retweetv) {
            if(randv){
                currentSong = Math.floor((Math.random() * (songs.length - 1)));
            }
            else{
               if (sk == 'back') {
                currentSong--;
                    if(currentSong < 0){
                        currentSong = Object.keys(currenTrack).length - 1;
                    }
                } 
                else if (sk == 'fwd') {
                    currentSong++;
                    if(currentSong > Object.keys(currenTrack).length - 1){
                        currentSong = 0;
                    }
                }
            }
            song.src =  song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
            document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + track[currentSong].id  + '.png"></img>';
        }
       if (!bool) {
           song.play();
        }
     }
 }


 function playpause() {
     var playId = 'playpause' + songId;
     var existe = '#playpause' + songId;
    
     if (!song.paused) {
         document.getElementById('playpause').innerHTML = '<i class="fas fa-play-circle"></i>';
         if ( $(existe).length > 0 ) {
            document.getElementById(playId).innerHTML = '<i class="fas fa-play-circle"></i>';
          }
         song.pause();
     }
      else {
         document.getElementById('playpause').innerHTML = '<i class="fas fa-stop-circle"></i>';
         if ( $(existe).length > 0 ) {
            document.getElementById(playId).innerHTML = '<i class="fas fa-stop-circle"></i>';
          }
         song.play();
     }
 }

 function retweet(){
     if (!retweetv) {
        retweetv = true;
        document.getElementById('retweet').style.transform = 'scale(1.05)';
        document.getElementById('retweet').style.color     = 'rgba(239,1,124,1)';
     }
     else {
        retweetv = false;
        document.getElementById('retweet').style.transform = 'scale(1.00)';
        document.getElementById('retweet').style.color     = 'rgb(173, 173, 173)';

     }

 }
 function random() {
     if (!randv) {
        randv = true;
        document.getElementById('random').style.transform = 'scale(1.05)';
        document.getElementById('random').style.color     = 'rgba(239,1,124,1)';
     }
      else {
        randv = false;
        document.getElementById('random').style.transform = 'scale(1.00)';
        document.getElementById('random').style.color     = 'rgb(173, 173, 173)';
     }
 }

 function setPos(pos) {
     if(!anuncio){
        song.currentTime = pos;
     }
 }

function mute() {
     if (muted) {
         song.volume = vol;
         muted = false;
         document.getElementById('mute').innerHTML = '<i class="fa fa-volume-up"></i>';
    } 
    else {
         song.volume = 0;
         muted = true;
         document.getElementById('mute').innerHTML = '<i class="fa fa-volume-off"></i>';
     }
}
 function setVolume(volume) {
     song.volume = volume;
     vol = volume;
     document.getElementById('volume').style.backgroundSize =  vol * 100 +'%';
 }
 song.addEventListener('timeupdate',function() {
     curtime = parseInt(song.currentTime,10);
     document.getElementById('seek').max = song.duration;
     document.getElementById('seek').value = curtime;
     document.getElementById('progressTimeCurrent').textContent = convertTime(Math.round(song.currentTime));
     document.getElementById('progressTimeRemaining').textContent = convertTime(Math.round(song.duration));
     var position = song.currentTime / song.duration;
     document.getElementById('seek').style.backgroundSize =  position * 100 +'%';
 });
 song.addEventListener("ended", function() {
     if(anuncio){
        song.src = guardarCancion = song.src;
        song.currentTime = guardarPosicion;
        song.pause;
        song.play;
        anuncio = false;
     }
     else{
        song.play();
        skip('fwd');
     }
 });
