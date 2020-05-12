<footer id="container-Footer" class="active">
    <section id="left-footer" class="left-footer">
    </section>

    <section id="center-footer" class="center-footer">
        <span class="logo-circle"><img id="logo-circle-center" src="images/logoR.png"></a></span>
        <span class="up-center" id="up-center">
             <i class="fas fa-random"></i>
             <i class="fas fa-step-backward"></i>
             <i class="fas fa-play-circle"></i>
             <i class="fas fa-step-forward"></i>
             <i class="fas fa-retweet"></i>
        </span>
        <span id="half-center" class="half-center">
            <p>0:00</p>
             <div class="progressBar">
                 <p class="progress"></p>
             </div>
                 <p>0:00</p>
        </span>
         <span class="down-center"><img id="logo-down-center" src="images/logoR.png"></a></span>
    </section>
    <section id="right-footer" class="right-footer">
        <span>
             <p><i class="fas fa-volume-up"></i></p>
             <div class="progressBar">
              <p class="progress"></p>
         </div>
        </span>
    </section>
</footer>

<script>
    const menuNormal = document.getElementById('logo-down-center');
    menuNormal.addEventListener('click', () => {
        document.getElementById('container-Footer').className = "active";
        document.getElementById('contents').style.height = '100%';
    });
    const menuCircular = document.getElementById('logo-circle-center');
    menuCircular.addEventListener('click', () => {
        document.getElementById('container-Footer').className = "";
        document.getElementById('contents').style.height = 'calc(100% - 100px)';
    });
</script>