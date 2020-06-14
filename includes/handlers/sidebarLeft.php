<?php
use es\ucm\fdi\aw\classes\classes\user as user;
?>
 <nav>
 <header class="sidebarHeader">
     <span><a class="logo"  onclick="openPage('vistaInicio.php')"><img src="images/logoR.png"></a></span>
     <?php
     $usuario = user::buscaUsuarioId($_SESSION['idUser']);
     echo '<p>'.$usuario->getUser().'</p>';
     ?>
     <a class="out" href="includes/procesarLogout.php">Cerrar Sesion</a>
 </header>
 <section class="sidebarSection">
     <ul>
         <li><a class="icon" onclick="openPage('vistaInicio.php')"><figure><i class="fas fa-home"></i><figcaption>Inicio<figcaption></figure></a></li>
         <li><a class="icon" onclick="openPage('vistaBusqueda.php')" ><figure><i class="fas fa-search"></i><figcaption>Buscar<figcaption></figure></a></li>
     </ul>
     <ul>
         <li><a class="icon" onclick="openPage('vistaBiblioteca.php')"><figure><i class="fas fa-list-ul"></i><figcaption>Tu Biblioteca<figcaption></figure></a></li>
         <li><a class="icon" onclick="openPage('vistaNoticias.php')"><figure><i class="fas fa-newspaper"></i><figcaption>Noticias<figcaption></figure></a></li>
     </ul>
     <span><hr></span>
     <ul>
         <li><a class="icon" onclick="openPage('vistaEstadisticas.php')"><figure><i class="fas fa-chart-bar"></i><figcaption>Estadisticas<figcaption></figure></a></li>
         <li><a class="icon" onclick="openPage('vistaUpload.php')"><figure><i class="fas fa-cloud-upload-alt"></i><figcaption>Subir Cancion<figcaption></figure></a></li>
     </ul>
	 <span><hr></span>
	 <ul>
         <?php
		    echo "<li><a class='icon' onclick='openPage(\"vistaUsuario.php?id=" .$_SESSION['idUser']. "\")'><figure><i class='fas fa-user'></i><figcaption>Cuenta<figcaption></figure></a></li>";
	     ?>
     </ul>
     <span><hr></span>
     <ul>
         <li><a class="icon" onclick="goBackForwar(-1)"><figure><i class="fas fa-arrow-left"></i><figcaption>Back<figcaption></figure></a></li>
         <li><a class="icon" onclick="goBackForwar(1)"><figure><i class="fas fa-arrow-right"></i><figcaption>Forward<figcaption></figure></a></li>
     </ul>
 </section>
 </nav>
