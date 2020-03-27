<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
       <title>Document</title>
</head>
<body>
      <footer id="container-Footer">
            <section id="left-footer" class="left-footer">

            </section>

           <section id="center-footer" class="center-footer">
                <span class="logo-circle"><img id="logo-circle-center" src="server/images/logoR.png"></a></span>
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
                 <span class="down-center"><img id="logo-down-center" src="server/images/logoR.png"></a></span>
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
          const menuNormal = document.getElementById('logo-circle-center');
          menuNormal.addEventListener('click', () => {
               document.getElementById('container-Footer').className = "";
          });
          const menuCircular = document.getElementById('logo-down-center');
          menuCircular.addEventListener('click', () => {
               document.getElementById('container-Footer').className = "active";
          });
     </script>
</body>
</html>