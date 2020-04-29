<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

$noticias = noticia::buscar($_SESSION['idUser']);


if ($noticias == null) echo "<p>Aún no tenemos noticias que mostrarle.</p>";
else{
echo "<div class=\"titulo\"><h1>NOTICIAS</h1></div>";
		foreach ($noticias as $noticia) {
			echo '<div class="imagen">';
			echo "<img src='server/images/noticias/". $noticia->getId() .".jpg'></div>";
			echo '<div class="texto"><h3>' . $noticia->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($noticia->getIdUser()))->getName() . '</p><p>' . $noticia->getTexto(). '</p>';
			echo '</div>';
		}
}