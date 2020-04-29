<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
//use es\ucm\fdi\aw\classes\databaseClasses\Noticia as Noticia;
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
		
		$html = '<form method="POST" action="vistaNoticias.php">';
		$html .= '<input type = "submit" name = "Aprobar" value = "Aprobar" >';
		$html .= '</form>';
		return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();
		$id = $noticia->getId();
		$idUser = $noticia->getIdUser();
		$title = $noticia->getTitle();
		$text = $noticia->getTexto();
		(new Noticia((new noticia($id, $idUser, $title, $text, 1))->toString()))->where("id", "LIKE", "%".$id."%");


        return $resultado;
    }

    //javascript como controlar audio ruben
}