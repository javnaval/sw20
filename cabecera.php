<?php
if (isset($_GET['cab']) && $_GET['cab'] == 1) {
    echo '<section id="cab1">';
    echo '<img id="img" src="img/soundayfondonegro.png" href="index.php" alt="Logo y titulo de la página">';
    echo '<a href=\'vistaLogin.php\' placeholder="Iniciar sesión">Iniciar sesión</a>  
        <a href=\'vistaSignIn.php\' placeholder="Registrarse">Registrarse</a>';
    echo '</div>';
    echo '</section>';
}
else {
    echo '<section id="cab2">';
    echo '<form href="procesarBusqueda.php" method="post">
            <input type="search" id="Busqueda" placeholder="Buscar artistas, canciones o álbumes">
            <input type="submit" name="Buscar" value="Buscar">
           </form>';
    echo '<a href="procesarLogout.php" placeholder="Logout">Logout</a>';
    echo '</section>';
}
