<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioEditarPerfil extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaUsuario.php";
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-editar", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $user = user::buscaUsuarioId($_SESSION['idUser']);
        $html = <<<EOF
        <fieldset>
                <legend>Editar</legend>
EOF;
       $html .= "<p>Correo electrónico: </p>";
        if (isset($datosIniciales['email'])) {
            $html .= "<p><input type=\"email\" name=\"email\"  value=".$datosIniciales['email']." required></p>";
        }
        else $html .= "<p><input type=\"email\" name=\"email\"  value=".$user->getEmail()." required></p>";

	   $html .= "</p>Nombre usuario: </p>";
        if (isset($datosIniciales['user'])) {
            $html .= "<p><input type=\"text\" name=\"user\" value=".$datosIniciales['user']." required></p>";
        }
        else $html .= "<p><input type=\"text\" name=\"user\" value=".$user->getUser()." required></p>";

	   $html .= "</p>Nombre: </p>";
        if (isset($datosIniciales['user'])) {
            $html .= "<p><input type=\"text\" name=\"name\" value=".$datosIniciales['name']." required></p>";
        }
        else $html .= "<p><input type=\"text\" name=\"name\" value=".$user->getName()." required></p>";

	   $html .= '<p><input type="submit" name="Actualizar" value="Actualizar"></p> </fieldset>';

	   if (is_array($err)) {
            foreach ($err as $e) {
                $html .= $e;
            }
        } else $html .= $err;
       return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();
		$idUser = user::getId();
        assert(is_string($datos['user']) && is_string($datos['email']) && is_string($datos['name']), "Error al introducir los datos");
        $usuario = htmlspecialchars(trim(strip_tags($datos['user'])));
        $email = htmlspecialchars(trim(strip_tags($datos['email'])));
		$name = htmlspecialchars(trim(strip_tags($datos['name'])));

		//Usuario::actualiza($usuario, $email, $name, $idUser);
		
		$resultado = "vistaInicio.php";
           
        return $resultado;
    }
}