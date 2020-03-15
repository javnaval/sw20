<?php
require_once "config.php";
require_once "claseCancion.php";

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscar = new claseCancion(htmlspecialchars(trim(strip_tags($_POST['busqueda']))));
$canciones = $buscar->buscar();
foreach ($canciones as $cancion) {
    echo $cancion->getCancion().' '.$cancion->getArtista().' '.$cancion->getAlbum();
    echo "<p>$cancion->getRuta()</p>";
}