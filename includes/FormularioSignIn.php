<?php
require_once "config.php";
require_once 'Form.php';
require_once dirname(__DIR__)."/classes/classes/user.php";
require_once dirname(__DIR__)."/classes/databaseClasses/Users.php";

class FormularioSignIn extends Form {

    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaSignIn.php";
        parent::__construct("form-signin", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales) {
        $html = <<<EOF
        <fieldset>
                <legend>Sign In</legend>
                <div id="s1">
EOF;
        if (isset($datosIniciales['email'])) {
            $html .= "<p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\" value=".$datosIniciales['email']." required></p>";
        }
        else $html .= " <p><input type=\"email\" name=\"email\" placeholder=\"Correo electrónico\" required></p>";
        if (isset($datosIniciales['user'])) {
            $html .= "<p><input type=\"text\" name=\"user\" value=".$datosIniciales['user']." placeholder=\"Usuario\" required></p>";
        }
        else $html .= "<p><input type=\"text\" name=\"user\" placeholder=\"Usuario\" required></p>";

        $html .= '<p><input type="password" name="pass" placeholder="Contraseña" required></p>
                <p><input type="password" name="pass2" placeholder="Repetir contraseña" required></p>
            </div>
            <div id="s3">
                <a href="vistaLogin.php" placeholder="¿Ya tienes cuenta? Iniciar sesión">¿Ya tienes cuenta? Iniciar sesión</a>
                <p><input type="submit" name="Registrarse" value="Registrarse"></p>
            </div>
        </fieldset>';

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $resultado = array();

        assert(is_string($datos['user']) && is_string($datos['pass']) && is_string($datos['email']) && is_string($datos['pass2']), "Error al introducir los datos");
        $usuario = htmlspecialchars(trim(strip_tags($datos['user'])));
        $contrasenia = htmlspecialchars(trim(strip_tags($datos['pass'])));
        $email = htmlspecialchars(trim(strip_tags($datos['email'])));
        $contrasenia2 = htmlspecialchars(trim(strip_tags($datos['pass2'])));

        if ($contrasenia == $contrasenia2) {
            try {
                $idUser = user::crea($usuario, $email, $contrasenia);
                session_regenerate_id(true);
                Application::getSingleton()->login($idUser);
                $resultado = "vistaInicio.php";
            }
            catch (Exception $exc) {
                $resultado[] = "<p id='error'>Usuario, email o contraseña incorrecto.</p>";
            }
        }
        else {
            $resultado[] = "<p id='error'>Usuario, email o contraseña incorrecto.</p>";
        }

        return $resultado;
    }
}