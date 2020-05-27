<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\Form as Form;

class FormularioCrearNoticia extends Form
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

		$html .= "<p><input type=\"text\" id=\"campotexto\" name=\"texto\" placeholder=\"Texto de la noticia\" required></p>";

        $html .= '<p><input type="file" name="fileImage" value="Elija una imagen" required></p>';

        $html .= '<p><input type="submit" name="Subir" onClick="validar(campotexto.value);" value="Subir"></p>
                </fieldset>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();

        assert(is_string($datos['titulo']));
        $title = htmlspecialchars(trim(strip_tags($datos['titulo'])));

        assert(is_string($datos['texto']));
        $texto = htmlspecialchars(trim(strip_tags($datos['texto'])));		

        if ($_FILES['fileImage']['error'] == UPLOAD_ERR_OK) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $ext = array_search($finfo->file($_FILES['fileImage']['tmp_name']),
                array(
                    'jpeg' => 'image/jpeg',
                    'jpg' => 'image/jpg',
                    'png' => 'image/png',
                ),
                true
            );
            if (!$ext || $_FILES['fileImage']['size'] > 10000000) {
                $resultado[] = "La extensión o el tamaño de los archivos no es correcta.";
            } else {
                $idNoticia = noticia::crea($title, $_SESSION['idUser'], $texto);
                if (move_uploaded_file($_FILES['fileImage']['tmp_name'], "server/noticias/images/" . $idNoticia . ".jpg")) {
                    $resultado[] = "El archivo ha sido cargado correctamente.";
                } else {
                    $resultado[] = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
        } else $resultado[] = "Error al subir el fichero (configuración)";

        return $resultado;
    }

}