var song = new Audio();
song.type = 'audio/mpeg';

const directionAnuncios = "server/anuncios/1.mp3";
const directionSONG = "server/songs/";
const directionIMG = "server/albums/images/";
const playpauseIDCONST = 'playpause';


var track;
var currenTrack = null;
var songId = null;
var Albumid;

var playpauseid;

var muted = false;
var currentSong = 0;
var vol = 1;
var randv = false;
var retweetv = false;
var anuncio = false;

var wavesurfer;

 function crearSpectro(id){
   var container = '#waveform' + id;
    wavesurfer = WaveSurfer.create({
        container: container,
        waveColor: 'violet',
        height: 65,
        hideScrollbar: true,
        cursorWidth: 0,
        progressColor: 'violet'
     });
 }

 function setTrack(albumPlayListId,numero,albumOrPlaylist){
     var direction = "includes/JSON/PlayListJSON.php";
     if(albumOrPlaylist == 1){
        direction = "includes/JSON/SongsJSON.php";
     }
     if(!anuncio){
        if(albumPlayListId == null){
            currentSong = 0;
            if(songId == numero){
                playpause();
            }
           else{
              song.src = directionSONG + numero + ".mp3";
              songId = numero;
              document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + songId  + '.png"></img>';
              //document.getElementById('nombre-cancion').textContent = track[currentSong].title;
              playpause();
           }
        }
        else{
           $.post(direction,{ albumPlayListId: albumPlayListId }, function(data) {
               track = JSON.parse(data);
               if(JSON.stringify(currenTrack) === JSON.stringify(track)){
                   if(numero == currentSong){
                      playpause();
                      actualizarIconoPlay();
                   }
                   else if((numero != null) && (Object.keys(currenTrack).length > numero)){
                       song.pause();
                       actualizarIconoPlay();
                       currentSong = numero;
                       song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
                       actualizarWaveSurfer(currenTrack[currentSong].id);
                       songId = currenTrack[currentSong].id;
                       document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + track[currentSong].id  + '.png"></img>';
                       document.getElementById('nombre-cancion').textContent = track[currentSong].title;
                       playpause();
                       actualizarIconoPlay();
                   }
               }
               else{
                   actualizarIconoPlay();
                   currentSong = 0;
                   currenTrack = track;
                   Albumid = albumPlayListId;
                   if((numero != null) && (numero >= 0) && (numero <= currenTrack.length)){
                      currentSong = numero;
                   }
                   song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
                   actualizarWaveSurfer(currenTrack[currentSong].id);
                   songId = currenTrack[currentSong].id;
                   document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + track[currentSong].id  + '.png"></img>';
                   document.getElementById('nombre-cancion').textContent = track[currentSong].title;
                   playpause();
                   actualizarIconoPlay();
               }
           });
        }
     }
 }

 function actualizarWaveSurfer(idSongNow){
     var containerWaveSurfer;
     if(songId == null){
        containerWaveSurfer = '#waveform' + idSongNow;
        if ($(containerWaveSurfer).length > 0 ) {
            crearSpectro(idSongNow);
            wavesurfer.load(song.src);
         }
     }
     else{
        containerWaveSurfer = '#waveform' + songId;
        if(idSongNow != songId){
            if ($(containerWaveSurfer).length > 0 ) {
                wavesurfer.destroy();
                crearSpectro(idSongNow);
                wavesurfer.load(song.src);
             }
         }
     }
 }


 function actualizarIconoPlay(){
    var playId = 'playpause' + songId;
    var existe = '#playpause' + songId;
    if (!song.paused) {
        document.getElementById('playpause').innerHTML = '<i class="fas fa-stop-circle"></i>';
         if ($(existe).length > 0 ) {
             document.getElementById(playId).innerHTML = '<i class="fas fa-stop-circle"></i>';
         }
    }
     else {
         document.getElementById('playpause').innerHTML = '<i class="fas fa-play-circle"></i>';
         if ($(existe).length > 0) {
             document.getElementById(playId).innerHTML = '<i class="fas fa-play-circle"></i>';
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
             if (!bool) {
               song.pause();
               actualizarIconoPlay();
             }
            actualizarWaveSurfer(currenTrack[currentSong].id);
            songId = currenTrack[currentSong].id;
            song.src =  song.src = directionSONG + currenTrack[currentSong].id + ".mp3";
            document.getElementById('img-song').innerHTML = '<img  src="' + directionIMG + track[currentSong].id  + '.png"></img>';
            document.getElementById('nombre-cancion').textContent = track[currentSong].title;
        }
        if (!bool) {
           playpause();
        }
        
     }
 }


 function playpause() {
     if (!song.paused) {
         song.pause();
     }
      else {
         song.play();
     }
     actualizarIconoPlay();
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
    $.post("includes/ajax/Premium.php", function(data) {
        if(anuncio == false){
            if(data == 5){
                 anuncio = true;
                 directionAnuncios
                 guardarPosicion = song.currentTime;
                 guardarCancion = song.src;
                 song.src =  directionAnuncios;
                 song.pause();
                 playpause();
            }
        }
    });
     if(anuncio){
        song.src = guardarCancion;
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
