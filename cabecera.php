<?php
echo '<img id="img" src="img/soundayfondonegro.png" href="index.php" alt="Logo y titulo de la página">';
if (isset($_SESSION) && $_SESSION['login'] == true){
    echo 'Bienvenido '.$_SESSION['nombre'].'. <a href=\'logout.php\'>Logout</a>';
}
else echo'<a href=\'vistaLogin.php\' placeholder="Iniciar sesión">Iniciar sesión</a>  
<a href=\'vistaSignIn.php\' placeholder="Registrarse">Registrarse</a>';
echo '</div>';
