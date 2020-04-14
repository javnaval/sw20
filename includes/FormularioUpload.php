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

    protected function generaCamposFormulario($datosIniciales) {
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


        return $html;
    }

    protected function procesaFormulario($datos) {
        $resultado = array();

        $nombre_archivo = $_FILES['fileAudio']['name'];
        $tipo_archivo = $_FILES['fileAudio']['type'];
        $tamano_archivo = $_FILES['fileAudio']['size'];

        if (!(strpos($tipo_archivo, "mp3") || strpos($tipo_archivo, "mp4"))) {
            $resultado[] = $tipo_archivo."La extensión o el tamaño de los archivos no es correcta.";
        }
        else {
            if (move_uploaded_file($_FILES['userfile']['tmp_name'],  "server/".$nombre_archivo)){
                "El archivo ha sido cargado correctamente.";
            }
            else{
                $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
        }
        return $resultado;
    }

    //javascript como controlar audio ruben
}