<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\databaseClasses\Noticias as Noticias;
use es\ucm\fdi\aw\Form as Form;

class FormularioAprobarNoticia extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaNoticias.php";
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-upload", $this->opciones);
    }

    protected function generaCamposFormulario($datos, $err) {
		$html = <<<EOF
        <fieldset>
                <legend>Aprobar Noticia</legend>
EOF;
		if ($noticias = noticia::buscar($_SESSION['idUser'])) {
            $html .= '<p>Elija la noticia:</p>
                        <select name="noticia">';
            foreach ($noticias as $noticia) {
                $html .= '<option value="' . $noticia->getId() . '">' . $noticia->getTitle() . '</option>';
            }
            $html .= '</select>';
        }
		$html .= '<input type = "submit" name = "Aprobar" value = "Aprobar" ></fieldset>';
		return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();
		
		$noticia = (new Noticias())->where("id", "LIKE", "%". $datos['noticia']."%")->get();
		$noticia = $noticia[0];
		$noticia2 = new noticia($noticia->getId(), $noticia->getIdUser(), $noticia->getTitle(), $noticia->getTexto(), 1);
		(new Noticias())->where("id","=",$noticia2->getId())->update($noticia2->toString());

        return $resultado;
    }
}