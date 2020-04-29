<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\user as user;

$resultado = array();

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscar = htmlspecialchars(trim(strip_tags($_POST['busqueda'])));
$canciones = song::buscar($buscar);
$artistas = user::buscar($buscar);
$albumes = album::buscar($buscar);

if ($canciones == null && $artistas == null && $albumes == null) $resultado[] = "<p>No existen resultados para su búsqueda.</p>";
else {
    if ($canciones != null){
        echo "<h1>CANCIONES</h1><section class=\"elementos\">";
        foreach ($canciones as $cancion) {
            echo '<div>';
            echo '<h3>' . $cancion->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($cancion->getIdUser()))->getName() . '</p><p>Album: ' . (album::buscaAlbumId($cancion->getIdAlbum()))->getTitle() . '</p>';
            echo '<audio src="server/songs/' . $cancion->getId()  . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
            echo '</div>';
        }
        echo "</section>";
    }

    if ($artistas != null) {
        echo "<h1>ARTISTAS</h1><section class=\"elementos\">";
        foreach ($artistas as $artista) {
            echo '<div>';
            echo '<h3>' . $artista->getName() . '</h3><p>Descripción: ' . $artista->getDescripcion() . '</p>';
            echo '</div>';
        }
        echo "</section>";
    }

    if ($albumes != null){
        echo "<h1>ALBUMES</h1><section class=\"elementos\">";
        foreach ($albumes as $album) {
            echo '<div>';
            echo '<h3>' . $album->getTitle() . '</h3><p>Año de lanzamiento: ' . $album->getReleaseDate() . '</p>';
            echo '</div>';
        }
        echo "</section>";
    }
}
