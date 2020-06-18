<?php
use es\ucm\fdi\aw\classes\classes\user as user;
?>
<link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
<nav>
<header class="sidebarHeader">
    <span><a class="logo" href="vistaInicio.php"><img src="images/logoR.png"></a></span>
    <?php
    $usuario = user::buscaUsuarioId($_SESSION['idUser']);
    echo '<p>'.$usuario->getUser().'</p>';
    ?>
    <a class="out" href="includes/procesarLogout.php">Cerrar Sesion</a>
</header>
<section class="sidebarSection">
    <ul>
        <li><a class="icon" onclick="openPage('vistaInicio.php')"><figure><i class="fas fa-home"></i><figcaption>Inicio<figcaption></figure></a></li>
        <li><a class="icon" onclick="openPage('vistaBusqueda.php')"><figure><i class="fas fa-search"></i><figcaption>Buscar<figcaption></figure></a></li>
    </ul>
    <ul>
        <li><a class="icon" onclick="openPage('vistaVerificarArtistas.php')"><figure><i class="fas fa-list-ul"></i><figcaption>Verificar artistas<figcaption></figure></a></li>
        <li><a class="icon" onclick="openPage('vistaNoticias.php')"><figure><i class="fas fa-newspaper"></i><figcaption>Verificar noticias<figcaption></figure></a></li>
    </ul>
    <span><hr></span>
    <ul>
        <li><a class="icon" onclick="openPage('vistaUsuario.php')"><figure><i class="fas fa-user"></i><figcaption>Cuenta<figcaption></figure></a></li>
    </ul>
</section>
</nav>
