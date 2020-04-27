<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\classes\contiene as contiene;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\playlist as playList;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioBusqueda extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaBusqueda.php";
        parent::__construct("form-buscar", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $html = "";
        if (isset($datosIniciales['busqueda'])) {
            $html .= '<input type = "search" name = "busqueda" value="'.$datosIniciales['busqueda'].'" placeholder = "Buscar artistas, canciones o álbumes" >';
        }
        else $html.= '<input type = "search" name = "busqueda" placeholder = "Buscar artistas, canciones o álbumes" >';
        $html .= '<input type = "submit" name = "Buscar" value = "Buscar" >';
        $html .= $err;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $resultado = array();

        assert(is_string($_POST['busqueda']), "Error al introducir los datos");
        $buscar = htmlspecialchars(trim(strip_tags($datos['busqueda'])));
        $canciones = song::buscar($buscar);
        $artistas = user::buscar($buscar);
        $albumes = album::buscar($buscar);

        $html = "";
        if ($canciones == null && $artistas == null && $albumes == null) $resultado[] = "<p>No existen resultados para su búsqueda.</p>";
        else {
            if ($canciones != null){
                $html.= "<h1>CANCIONES</h1>";
                foreach ($canciones as $cancion) {
                    $html.= '<div>';
                    $html.= '<h3>' . $cancion->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($cancion->getIdUser()))->getName() . '</p><p>Album: ' . (album::buscaAlbumId($cancion->getIdAlbum()))->getTitle() . '</p>';
                    $html.= '<audio src="server/songs/' . $cancion->getId()  . '.mp3" type="audio/mpeg" controls>Tu navegador no soporta el audio</audio>';
                    $html.= '</div>';
                }
            }

            if ($artistas != null) {
                $html.= "<h1>ARTISTAS</h1>";
                foreach ($artistas as $artista) {
                    $html.= '<div>';
                    $html.= '<h3>' . $artista->getName() . '</h3><p>Descripción: ' . $artista->getDescripcion() . '</p>';
                    $html.= '</div>';
                }
            }

            if ($albumes != null){
                $html.= "<h1>ALBUMES</h1>";
                foreach ($albumes as $album) {
                    $html.= '<div>';
                    $html.= '<h3>' . $album->getTitle() . '</h3><p>Año de lanzamiento: ' . $album->getReleaseDate() . '</p>';
                    $html.= '</div>';
                }
            }
        }
        $resultado[] = $html;

        return $resultado;
    }
}