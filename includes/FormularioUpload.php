<?php
require_once "config.php";
require_once 'Form.php';

class FormularioUpload extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaInicio.php?pag=2&upload=false";
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-upload", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $html = <<<EOF
        <fieldset>
                <legend>Upload</legend>
EOF;

        if (isset($datosIniciales['artista'])) {
            $html .= "<input type=\"text\" name=\"artista\" placeholder=\"Artista\" value= " . $datosIniciales['artista'] . " required>";
        } else $html .=  "<input type=\"text\" name=\"artista\" placeholder=\"Artista\" required>";

        $html .= '<input type="file" name="fileAudio" required>
                <input type="submit" name="Subir" value="Subir">
                </fieldset>';

        $html .= $err;

        return $html;
    }

    protected function procesaFormulario($datos) {
        $resultado = array();

        /*assert(is_string($_FILES['fileAudio']['name']));
        $name = htmlspecialchars(trim(strip_tags($_FILES['fileAudio']['name'])));

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === array_search($finfo->file($_FILES['fileAudio']['tmp_name']),
            array(
                'mp3' => 'audio/mpeg',
                'mp4' => 'audio/mp4',
                'ogg' => 'audio/ogg',
            ),
            true
        ) || $_FILES['fileAudio']['size'] > 100000000){
            $resultado[] = "La extensión o el tamaño de los archivos no es correcta.";
        }
        else {
            $idUser = song::crea($name, $_SESSION['idUser'], "", "");*/
            if (move_uploaded_file($_FILES['fileAudio']['tmp_name'], "server/songs/4.mp3")){
                $resultado[] = "El archivo ha sido cargado correctamente.";
            }
            else {
                $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
        //}
        return $resultado;
    }

    //javascript como controlar audio ruben
}