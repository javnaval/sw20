<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;


class FormularioSignIn extends Form {

    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaSignIn.php";
        parent::__construct("form-signin", $this->opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $err) {
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
            </div>';
        if (is_array($err)) {
            foreach ($err as $e) {
                $html .= $e;
            }
        } else $html .= $err;
        $html .= '<div id="s3">
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
            $user = user::buscaUsuario($usuario);
            if($user[0] == null){
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
            else{
                $resultado[] = "<p id='error'>Usuario, email o contraseña incorrecto.</p>";
            }
        }
        else {
            $resultado[] = "<p id='error'>Las contraseñas deben ser iguales.</p>";
        }

        return $resultado;
    }
}