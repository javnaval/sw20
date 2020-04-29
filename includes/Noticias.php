<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

$noticias = noticia::buscar($_SESSION['idUser']);


if ($noticias == null) echo "<p>Aún no tenemos noticias que mostrarle.</p>";
else{
echo "<h1>NOTICIAS</h1>";
		foreach ($noticias as $noticia) {
			echo '<div>';
			echo '<h3>' . $noticia->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($noticia->getIdUser()))->getName() . '</p><p>' . $noticia->getTexto(). '</p>';
			echo '</div>';
		}
}