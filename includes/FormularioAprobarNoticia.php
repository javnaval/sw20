<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\databaseClasses\Noticias as Noticias;
use es\ucm\fdi\aw\Form as Form;

class FormularioAprobarNoticia extends Form {
    private $opciones = array();
	private $noticia;

    public function __construct($noticia) {
		$this->noticia = $noticia;
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
		$id = $this->noticia->getId();
		$idUser = $this->noticia->getIdUser();
		$title = $this->noticia->getTitle();
		$text = $this->noticia->getTexto();
		(new Noticias((new noticia($id, $idUser, $title, $text, 1))->toString()))->where("id", "LIKE", "%".$id."%");


        return $resultado;
    }
}