<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\classes\song as song;

assert(is_string($_POST[$var]));
$buscar = htmlspecialchars(trim(strip_tags($_POST[$var])));
$canciones = song::buscar($buscar);


if ($canciones == null) echo "<p>No existen resultados para su búsqueda.</p>";
else{
echo "<h1>CANCIONES</h1>";
		foreach ($canciones as $cancion) {
			echo '<div>';
			echo '<h3>' . $cancion->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($cancion->getIdUser()))->getName() . '</p><p>Album: ' . (album::buscaAlbumId($cancion->getIdAlbum()))->getTitle() . '</p>';
			echo '<audio src="server/songs/' . $cancion->getId()  . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
			echo '</div>';
		}
}
