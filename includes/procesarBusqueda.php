<?php
require_once "config.php";
require_once dirname(__DIR__)."/classes/classes/song.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Songs.php";
require_once dirname(__DIR__)."/classes/classes/artist.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Artists.php";
require_once dirname(__DIR__)."/classes/classes/album.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Albums.php";

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscar = htmlspecialchars(trim(strip_tags($_POST['busqueda'])));
$canciones = (new Songs())->where("title", "LIKE", "%".$buscar."%")->get();
$artistas = (new Artists())->where("name", "LIKE", "%".$buscar."%")->get();
$albumes = (new Albums())->where("title", "LIKE", "%".$buscar."%")->get();

<<<<<<< HEAD
echo "<h1>CANCIONES</h1>";
foreach ($canciones as $cancion) {
    echo '<div>';
    echo '<h3>' . $cancion->getTitle() . '</h3><p>Artista: ' . $cancion->getIdArtist() . '</p><p>Album: ' . $cancion->getIdAlbum() . '</p>';
    echo '<audio src="server/'.$cancion->getId().'.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
    echo '</div>';
}

echo "<h1>ARTISTAS</h1>";
foreach ($artistas as $artista) {
    echo '<div>';
    echo '<h3>'.$artista->getName().'</h3><p>Género: '.$artista->getGenre().'</p>';
    echo '</div>';
}

echo "<h1>ALBUMES</h1>";
foreach ($albumes as $album) {
    echo '<div>';
    echo '<h3>'.$album->getTitle().'</h3><p>Año de lanzamiento: '.$album->getReleaseDate().'</p>';
    echo '</div>';
=======
if ($canciones == null && $artistas == null && $albumes == null) $resultado[] = "<p>No existen resultados para su búsqueda.</p>";
else {
    if ($canciones != null) echo "<h1>CANCIONES</h1>";
    foreach ($canciones as $cancion) {
        echo '<p><div>';
        echo '<h3>' . $cancion->getTitle() . '</h3><p>Artista: ' . $cancion->getIdArtist() . '</p><p>Album: ' . $cancion->getIdAlbum() . '</p>';
        echo '<audio src="server/' . $cancion->getId() . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
        echo '</div></p>';
    }

    if ($artistas != null) echo "<h1>ARTISTAS</h1>";
    foreach ($artistas as $artista) {
        echo '<p><div>';
        echo '<h3>' . $artista->getName() . '</h3><p>Género: ' . $artista->getGenre() . '</p>';
        echo '</div></p>';
    }

    if ($albumes != null) echo "<h1>ALBUMES</h1>";
    foreach ($albumes as $album) {
        echo '<p><div>';
        echo '<h3>' . $album->getTitle() . '</h3><p>Año de lanzamiento: ' . $album->getReleaseDate() . '</p>';
        echo '</div></p>';
    }
>>>>>>> 3e58db7c0d1ffc4baa9c249fcbe041b9243b2539
}