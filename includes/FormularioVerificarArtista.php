<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\Form as Form;

class FormularioVerificarArtista extends Form {
    private $opciones = array();

    public function __construct() {
        $this->opciones['action'] = "vistaVerificarArtistas.php";
        parent::__construct("form-verificar", $this->opciones);
    }

    protected function generaCamposFormulario($datos, $err) {
		$html = '<h1>ARTISTAS</h1>';

        $users = user::usersVerificar();
        if ($users == null) $html .= "<p>No hay artistas que verificar.</p>";
        else {
            $html .= '<p>Elija lo(s) artistas: <input class="boton" type = "submit" name = "Verificar" value = "VERIFICAR" ></p>';
            foreach ($users as $user) {
                $html .= '<section class="art"><div class="checkbox"><input type="checkbox" name="' . $user->getId() . '" value="' . $user->getId() . '"></div>
                <div class="imagen"><img src="server/users/images/'. $user->getId() .'.jpg"></div>
                <div class="texto"><h3>' . $user->getUser() . '</h3><p>Nombre: ' .$user->getName(). '</p><p>' . $user->getDescripcion(). '</p></div>
                </section>';
            }
            $html .= '<input class="boton" type = "submit" name = "Verificar" value = "VERIFICAR" >';
        }

		return $html;
    }

    protected function procesaFormulario($datos)
    {
        foreach ($datos as $key => $dato) {
            if (is_int($key)) {
                $user = user::buscaUsuarioId($dato);
                $user->setRol('artista');
				$user->setSolicitado(0);
                $user->update($user);
            }
        }

		$resultado = 'vistaVerificarArtistas.php';
        return $resultado;
    }
}