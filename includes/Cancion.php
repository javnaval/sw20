<?php
require_once "config.php";
require_once dirname(__DIR__) . "/classes/classes/song.php";
require_once dirname(__DIR__) . "/classes/factories/databaseFactory.php";

assert(is_string($_POST[$var]);
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
