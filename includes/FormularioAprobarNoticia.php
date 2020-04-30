<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioAprobarNoticia extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaNoticias.php";
        parent::__construct("form-upload", $this->opciones);
    }

    protected function generaCamposFormulario($datos, $err) {
		$html = '<h1>NOTICIAS</h1>';

        $noticias = noticia::buscar($_SESSION['idUser']);
        if ($noticias == null) $html .= "<p>Aún no tenemos noticias que mostrarle.</p>";
        else {
            $html .= '<p>Elija la(s) noticia: <input class="boton" type = "submit" name = "Aprobar" value = "APROBAR" ></p>';
            foreach ($noticias as $noticia) {
                $html .= '<section class="noticia"><div class="checkbox"><input type="checkbox" name="' . $noticia->getId() . '" value="' . $noticia->getId() . '"></div>
                <div class="imagen"><img src="server/noticias/images/'. $noticia->getId() .'.jpg"></div>
                <div class="texto"><h3>' . $noticia->getTitle() . '</h3><p>Autor: ' . (user::buscaUsuarioId($noticia->getIdUser()))->getName() . '</p><p>' . $noticia->getTexto(). '</p></div>
                </section>';
            }
            $html .= '<input class="boton" type = "submit" name = "Aprobar" value = "APROBAR" >';
        }

		return $html;
    }

    protected function procesaFormulario($datos)
    {
        foreach ($datos as $key => $dato) {
            if (is_int($key)) {
                $noticia = noticia::buscaNoticiaId($dato);
                $noticia->setAccepted('1');
                $noticia->update($noticia);
            }
        }

		$resultado = 'vistaNoticias.php';
        return $resultado;
    }
}