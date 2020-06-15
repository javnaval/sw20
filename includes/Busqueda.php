<?php
namespace es\ucm\fdi\aw;
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\user as user;

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscar = htmlspecialchars(trim(strip_tags($_POST['busqueda'])));
$canciones = song::buscar($buscar);
$usuarios = user::buscar($buscar);
$albumes = album::buscar($buscar);

if ($canciones == null && $usuarios == null && $albumes == null) echo "<p>No existen resultados para su búsqueda.</p>";
else {
    if ($canciones != null){
        echo "<h1>CANCIONES</h1><section class=\"elementos\">";
        foreach ($canciones as $cancion) {
            echo '<a class="buscar" href="vistaCancion.php?id='  .$cancion->getId() . '"><div>';
            echo '<h3>' . $cancion->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($cancion->getIdUser()))->getName() . '</p><p>Album: ' . (album::buscaAlbumId($cancion->getIdAlbum()))->getTitle() . '</p>';
            echo '<audio src="server/songs/' . $cancion->getId()  . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
            echo '</div></a>';
        }
        echo "</section>";
    }

    if ($usuarios != null) {
        echo "<h1>ARTISTAS</h1><section class=\"elementos\">";
        foreach ($usuarios as $artista) {
            if (in_array($artista->getRol(), array("artista"), TRUE) && $artista->getId() != $_SESSION['idUser']) {
                echo '<a class="buscar" href="vistaUsuario.php?id='  .$artista->getId() . '"><div>';
                echo '<h3>' . $artista->getName() . '</h3><p>Descripción: ' . $artista->getDescripcion() . '</p>';
                echo '</div></a>';
                if (seguidor::siguiendo($_SESSION['idUser'],$artista->getId())) echo '<a class="siguiendo" id="' .$artista->getId(). '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$artista->getId(). '\')" placeholder="Seguir">Siguiendo</a>';
                else echo '<a class="seguir" id="' .$artista->getId(). '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$artista->getId(). '\')" placeholder="Seguir">Seguir</a>';
            }
        }
        echo "</section>";
    }

    if ($usuarios != null) {
        echo "<h1>USUARIOS</h1><section class=\"elementos\">";
        foreach ($usuarios as $usuario) {
            if (in_array($usuario->getRol(), array("usuario","premium"), TRUE) && $usuario->getId() != $_SESSION['idUser']) {
                echo '<a class="buscar" href="vistaUsuario.php?id='  .$usuario->getId() . '"><div>';
                echo '<h3>' . $usuario->getName() . '</h3><p>Descripción: ' . $usuario->getDescripcion() . '</p>';
                echo '</div></a>';
                if (seguidor::siguiendo($_SESSION['idUser'],$usuario->getId())) echo '<a class="siguiendo" id="' .$usuario->getId(). '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$usuario->getId(). '\')" placeholder="Seguir">Siguiendo</a>';
                else echo '<a class="seguir" id="' .$usuario->getId(). '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$usuario->getId(). '\')" placeholder="Seguir">Seguir</a>';
            }
        }
        echo "</section>";
    }

    if ($albumes != null){
        echo "<h1>ALBUMES</h1><section class=\"elementos\">";
        foreach ($albumes as $album) {
            echo '<a class="buscar" href="vistaAlbum.php?id='  .$album->getId() . '"><div>';
            echo '<h3>' . $album->getTitle() . '</h3><p>Año de lanzamiento: ' . $album->getReleaseDate() . '</p>';
            echo '</div></a>';
        }
        echo "</section>";
    }
}
