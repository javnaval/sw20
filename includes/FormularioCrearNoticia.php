<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\Form as Form;

class FormularioUpload extends Form
{
    private $opciones = array();

    public function __construct()
    {
        $this->opciones['action'] = "vistaCrearNoticia.php";
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-crearNoticia", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err)
    {
        $html = <<<EOF
        <fieldset>
                <legend>Crear Noticia</legend>
EOF;

		$html .= "<p><input type=\"text\" name=\"titulo\" placeholder=\"Titulo\" required></p>";

		$html .= "<p><input type=\"text\" name=\"texto\" placeholder=\"Texto de la noticia\" required></p>";

        $html .= '<p><input type="file" name="fileImage" accept="image/png, image/jpeg" value="Elija una imagen" required></p>';

        $html .= '<p><input type="submit" name="Subir" value="Subir"></p>
                </fieldset>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();

        assert(is_string($datos['titulo']));
        $title = htmlspecialchars(trim(strip_tags($datos['titulo'])));
        if (isset($datos['tituloAlbum'])) {
            assert(is_string($datos['tituloAlbum']));
            $titleAlbum = htmlspecialchars(trim(strip_tags($datos['tituloAlbum'])));
            $date = htmlspecialchars(trim(strip_tags($datos['dateAlbum'])));
        }

        if ($_FILES['fileAudio']['error'] == UPLOAD_ERR_OK) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $ext = array_search($finfo->file($_FILES['fileAudio']['tmp_name']),
                array(
                    'mp3' => 'audio/mpeg',
                    'mp4' => 'audio/mp4',
                    'ogg' => 'audio/ogg',
                ),
                true
            );
            if (!$ext || $_FILES['fileAudio']['size'] > 10000000) {
                $resultado[] = "La extensión o el tamaño de los archivos no es correcta.";
            } else {
                if ($datos['type'] == 'single') {
                    $idAlbum = album::crea($_SESSION['idUser'], $title, date('Y-m-d'));
                    $idSong = song::crea($title, $_SESSION['idUser'], $idAlbum);
                } else {
                    if (isset($datos['tituloAlbum'])) {
                        $idAlbum = album::crea($_SESSION['idUser'], $titleAlbum, $date);
                        $idSong = song::crea($title, $_SESSION['idUser'], $idAlbum);
                    } else $idSong = song::crea($title, $_SESSION['idUser'], $datos['album']);
                }
                if (move_uploaded_file($_FILES['fileAudio']['tmp_name'], "server/songs/" . $idSong . "." . $ext)) {
                    $resultado[] = "El archivo ha sido cargado correctamente.";
                } else {
                    $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
        } else $resultado[] = "Error al subir el fichero (configuración)";

        return $resultado;
    }

}

    //javascript com