<?php
require_once "config.php";
require_once 'Form.php';
require_once dirname(__DIR__) . "/classes/classes/song.php";
require_once dirname(__DIR__) . "/classes/factories/databaseFactory.php";

class FormularioUpload extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaInicio.php?pag=2&upload=true";
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

        if (isset($datosIniciales['artista'])) {
            $html .= "<p><input type=\"text\" name=\"artista\" placeholder=\"Artista\" value= " . $datosIniciales['artista'] . " required></p>";
        } else $html .=  "<p><input type=\"text\" name=\"artista\" placeholder=\"Artista\" required></p>";

        $html .= '<p><input type="file" name="fileAudio" value="Elija un archivo" required></p>
                <p><input type="submit" name="Subir" value="Subir"></p>
                </fieldset>';

        $html .= $err;

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();

        assert(is_string($_FILES['fileAudio']['name']));
        $name = htmlspecialchars(trim(strip_tags($_FILES['fileAudio']['name'])));

        if ($_FILES['fileAudio']['error'] == UPLOAD_ERR_OK) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
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
                $idSong = song::crea($name, $_SESSION['idUser'], "1", "1");
                if (move_uploaded_file($_FILES['fileAudio']['tmp_name'], "server/songs/".$idSong.".".$ext)) {
                    $resultado[] = "El archivo ha sido cargado correctamente.";
                } else {
                    $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
        }
        else $resultado[] = "Error al subir el fichero. ";

        return $resultado;
    }

    //javascript como controlar audio ruben
}