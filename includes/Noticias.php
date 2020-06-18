<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

$noticias = noticia::buscar($_SESSION['idUser']);

echo '<h1>NOTICIAS</h1>';
if ($noticias == null) echo "<p>Aún no tenemos noticias que mostrarle.</p>";
else{
if(user::esArtista($_SESSION['idUser'])) echo '<a class="activar" onclick="openPage(\'vistaCrearNoticia.php\')">Crear noticia</a>';
echo "<div class='not'>";
		foreach ($noticias as $noticia) {
			echo '<div class="imagen">';
			echo "<img src='server/noticias/images/". $noticia->getId() .".jpg'></div>";
			echo '<div class="texto"><h3>' . $noticia->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($noticia->getIdUser()))->getName() . '</p><p>' . $noticia->getTexto(). '</p>';
			echo '</div>';
			if(user::esGestor($_SESSION['idUser'])) echo '<div class="aprobar"><a onclick="apruebaNoticia(\'' . $noticia->getId() . '\')">Aprobar</a></div>';
		}
		echo '</div>';

}