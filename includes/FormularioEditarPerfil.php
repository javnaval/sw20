<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioEditarPerfil extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaUsuario.php?id='" . $_SESSION['idUser'];
        $this->opciones['enctype'] = "multipart/form-data";
        parent::__construct("form-editar", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $user = user::buscaUsuarioId($_SESSION['idUser']);
        $html = <<<EOF
        <fieldset>
                <legend>Editar</legend>
EOF;
       $html .= "<p>Correo electrónico: ";
        if (isset($datosIniciales['email'])) {
            $html .= "<input type=\"email\" name=\"email\"  value=".$datosIniciales['email']." required></p>";
        }
        else $html .= "<input type=\"email\" name=\"email\"  value=".$user->getEmail()." required></p>";

	   $html .= "</p>Nombre usuario: ";
        if (isset($datosIniciales['user'])) {
            $html .= "<input type=\"text\" name=\"user\" value=".$datosIniciales['user']." required></p>";
        }
        else $html .= "<input type=\"text\" name=\"user\" value=".$user->getUser()." required></p>";

	   $html .= "</p>Nombre: ";
        if (isset($datosIniciales['name'])) {
            $html .= "<input type=\"text\" name=\"name\" value=".$datosIniciales['name']." required></p>";
        }
        else $html .= "<input type=\"text\" name=\"name\" value=".$user->getName()." required></p>";

        $html .= "</p>Descripcion: ";
        if (isset($datosIniciales['descripcion'])) {
            $html .= "<input type=\"text\" name=\"descripcion\" value=".$datosIniciales['descripcion']."></p>";
        }
        else $html .= "<input type=\"text\" name=\"descripcion\" value=".$user->getDescripcion()."></p>";

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

		$user = user::buscaUsuarioId($_SESSION['idUser']);

        assert(is_string($datos['user']) && is_string($datos['email']) && is_string($datos['name']), "Error al introducir los datos");
        $usuario = htmlspecialchars(trim(strip_tags($datos['user'])));
        $email = htmlspecialchars(trim(strip_tags($datos['email'])));
		$name = htmlspecialchars(trim(strip_tags($datos['name'])));
        $descripcion = '';
        if (isset($datos['descripcion'])){
            assert(is_string($datos['descripcion']), "Error al introducir los datos");
            $descripcion = htmlspecialchars(trim(strip_tags($datos['descripcion'])));
        }

		$user->actualiza($usuario, $email, $name, $descripcion);
		
		$resultado = "vistaUsuario.php?id='" . $_SESSION['idUser'];
           
        return $resultado;
    }
}