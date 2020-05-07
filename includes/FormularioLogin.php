<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioLogin extends Form {

    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaLogin.php";
        parent::__construct("form-login", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
        $html = <<<EOF
        <fieldset>
            <legend>Login</legend>
            <div id="s1">
EOF;
        if (isset($datosIniciales['user'])) {
            $html.= "<p><input type=\"text\" name=\"user\" value=".$datosIniciales['user']." placeholder=\"Usuario\" required></p>";
        }
        else $html.= "<p><input type=\"text\" name=\"user\" placeholder=\"Usuario\" required></p>";

        $html .= '<p><input type="password" name="pass" placeholder="Contraseña" required></p>
            </div>';
        if (is_array($err)) {
            foreach ($err as $e) {
                $html .= $e;
            }
        } else $html .= $err;
        $html .= '<div id="s2">
                <a href="vistaSignIn.php" placeholder="¿Aun no está registrado? Crear una cuenta">¿Aun no está registrado? Crear una cuenta</a>
                <p><input type="submit" name="Iniciar sesión" value="Iniciar sesión"></p>
            </div>
        </fieldset>';

                return $html;
    }

    protected function procesaFormulario($datos) {
        $resultado = array();

        assert(is_string($datos['user']) && is_string($datos['pass']), "Error al introducir los datos");
        $usuario = htmlspecialchars(trim(strip_tags($datos['user'])));
        $contrasenia = htmlspecialchars(trim(strip_tags($datos['pass'])));

        $user = user::login($usuario,$contrasenia);
        
        if ($user) {
            session_regenerate_id(true);
            Application::getSingleton()->login($user->getId());
            $resultado = "vistaInicio.php";
        }
        else {
            $resultado[] = "<p id='error'>Usuario o contraseña incorrecto.</p>";
        }

        return $resultado;
     }

}