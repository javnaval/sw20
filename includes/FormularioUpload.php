<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\Form as Form;

class FormularioUpload extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaUpload.php";
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-upload", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $html = <<<EOF
        <fieldset>
                <legend>Upload</legend>
EOF;

        if (isset($datosIniciales['titulo'])) {
            $html .= "<p><input type=\"text\" name=\"titulo\" placeholder=\"Titulo\" value= " . $datosIniciales['titulo'] . " required></p>";
        } else $html .=  "<p><input type=\"text\" name=\"titulo\" placeholder=\"Titulo\" required></p>";

        $html .= '<p><input type="file" name="fileAudio" value="Elija un archivo" required></p>
                    <input type="radio" name="type" value="album" onClick="muestra(\'eleccionAlbum\')">Album';
        $html .= '<div id="eleccionAlbum">';
        if ($albums = album::mostrarAlbums($_SESSION['idUser'])) {
            $html .= '<p>Elija el album:</p>
                        <select name="album">';
            foreach ($albums as $album) {
                $html .= '<option value="' . $album->getId() . '">' . $album->getTitle() . '</option>';
            }
            $html .= '</select>';
        }
        $html .= '<a href="vistaUpload.php">Crear nuevo album</a></div>
                <p><input type="radio" name="type" value="single" onClick="oculta(\'eleccionAlbum\')" checked>Single</p>';

        $html .= '<p><input type="submit" name="Subir" value="Subir"></p>
                </fieldset>';

        $html .= $err;

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();

        assert(is_string($datos['titulo']));
        $title = htmlspecialchars(trim(strip_tags($datos['titulo'])));

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
            }
            else {
                if($datos['type'] == 'single') {
                    $idAlbum = album::crea($_SESSION['idUser'], $title, date('Y-m-d'));
                    $idSong = song::crea($title, $_SESSION['idUser'], $idAlbum);
                }
                else $idSong = song::crea($title, $_SESSION['idUser'], $datos['album']);
                if (move_uploaded_file($_FILES['fileAudio']['tmp_name'], "server/songs/".$idSong.".".$ext)) {
                    $resultado[] = "El archivo ha sido cargado correctamente.";
                } else {
                    $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
        }
        else $resultado[] = "Error al subir el fichero (configuración)";

        return $resultado;
    }

    //javascript como controlar audio ruben
}