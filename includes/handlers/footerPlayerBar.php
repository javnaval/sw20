<footer id="container-Footer" class="active">
    <section id="left-footer" class="left-footer">
         <span id="img-song"><img  src="images/logoR.png"></a></span>
    </section>

    <section id="center-footer" class="center-footer">
        <span class="logo-circle"><img id="logo-circle-center" src="images/logoR.png"></a></span>
        <span class="up-center" id="up-center">
             <button id="random"    onclick="random()"><i class="fas fa-random"></i></button>
             <button id="skipback"  onclick="skip('back')"><i class="fas fa-step-backward"></i></button>
             <button id="playpause" onclick="playpause()"><i class="fas fa-play-circle"></i></button>
             <button id="skipfwd"   onclick="skip('fwd')"><i class="fas fa-step-forward"></i></button>
             <button id="retweet"   onclick="retweet()"><i class="fas fa-retweet"></i></button>
        </span>
        <span id="half-center" class="half-center">
             <p id="progressTimeCurrent">00:00</p>
             <div id="seekbar" class="seekbar">
                  <input type="range" oninput="setPos(this.value)" id="seek" value="0" max="">
             </div>
             <p id="progressTimeRemaining">00:00</p>
        </span>
         <span class="down-center"><img id="logo-down-center" src="images/logoR.png"></a></span>
    </section>
    <section id="right-footer" class="right-footer">
         <button id="mute" onclick="mute()"><i class="fas fa-volume-up"></i></button>
         <div id="soundbar" class="soundbar">
             <input type="range" id="volume" oninput="setVolume(this.value)" min="0" max="1" step="0.01" value="1">
         </div>
    </section>
</footer>

<script>

    const menuNormal = document.getElementById('logo-down-center');
    menuNormal.addEventListener('click', () => {
        document.getElementById('container-Footer').className = "active";
    });
    const menuCircular = document.getElementById('logo-circle-center');
    menuCircular.addEventListener('click', () => {
        document.getElementById('container-Footer').className = "";
    });
    document.getElementById('volume').style.backgroundSize =  vol * 100 +'%';
</script>