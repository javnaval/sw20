<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\FormularioAprobarNoticia as FormularioAprobarNoticia;

$noticias = noticia::buscar($_SESSION['idUser']);


if ($noticias == null) echo "<p>Aún no tenemos noticias que mostrarle.</p>";
else{
echo "<h1>NOTICIAS</h1><div class='not'>";
		foreach ($noticias as $noticia) {
			echo '<div class="imagen">';
			echo "<img src='server/noticias/images/". $noticia->getId() .".jpg'></div>";
			echo '<div class="texto"><h3>' . $noticia->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($noticia->getIdUser()))->getName() . '</p><p>' . $noticia->getTexto(). '</p>';
			echo '</div>';
		}
		echo '</div>';

}