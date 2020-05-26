<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;
use es\ucm\fdi\aw\Form as Form;


class FormularioPlaylist extends Form{

    private $opciones = array();

 public function __construct() {
        $this->opciones['action'] = "vistaBiblioteca.php";
        parent::__construct("form-playlist", $this->opciones);
    }
	
    protected function generaCamposFormulario($datosIniciales, $err) {
        $html = <<<EOF
        <fieldset>
                <legend>Crea tu playlist</legend>
                <div id="s1">
EOF;
       
        if (isset($datosIniciales['titulo'])) {
            $html .= "<p><input type=\"text\" name=\"titulo\" value=".$datosIniciales['titulo']." placeholder=\"title\" required></p>";
        }
        else $html .= "<p><input type=\"text\" name=\"titulo\" placeholder=\"titulo\" required></p>";

   
        if (is_array($err)) {
            foreach ($err as $e) {
                $html .= $e;
            }
        } else $html .= $err;
		
        $html .= '<div id="s3">
                <p><input type="submit" name="Crear Playlist" value="CreaPlaylist"></p>
            </div>
        </fieldset>';

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();
		
		$idUser=$_SESSION['idUser'];
		
        assert(is_string($datos['titulo']), "Error al introducir los datos");
        $tituloPlaylist = htmlspecialchars(trim(strip_tags($datos['titulo'])));
       
	   
            $playlist = playlist::buscaTitlePlaylist($idUser, $tituloPlaylist);
            if($playlist[0] == null){
                try {
                    $idPlaylist = playlist::crea($idUser, $tituloPlaylist);
                    
                   // $resultado = "vistaBiblioteca.php";
                }
                catch (Exception $exc) {
                    $resultado[] = "<p id='error'>Usuario, email o contraseña incorrecto.</p>";
                }

            }
            

       // return $resultado;
    }
}