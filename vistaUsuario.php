<?php
require_once 'includes/config.php';

use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioEditarPerfil();
$htmlform = $form->gestiona();
include("includes/handlers/includedFiles.php");

function muestraInteraccion($id,$form){
    $html = '';
    if ($id != $_SESSION['idUser']) {
        $html .= "</div>";
		if(user::esAdmin($_SESSION['idUser']))
		{
			if (user::esGestor($id) && !user::esAdmin($id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestionaDarGestor(\'' . $id . '\')" placeholder="DarGestor">Es gestor</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestionaDarGestor(\'' . $id . '\')" placeholder="DarGestor">Elegir como gestor</a>';
		}
		if(user::esGestor($_SESSION['idUser']))
		{
			if(!user::esGestor($id))
			{
				if (user::estaBloqueado($id)) $html .= '<a class="activado" id="bloqueado" onclick="gestionaBloquearUsuario(\'' . $id . '\')" placeholder="BloquearUsuario">Bloqueado</a>';
				else $html .= '<a class="activar" id="bloqueado" onclick="gestionaBloquearUsuario(\'' . $id . '\')" placeholder="BloquearUsuario">Bloquear usuario</a>';
			}
		}
		else
		{
			if (seguidor::siguiendo($_SESSION['idUser'], $id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestiona(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\')" placeholder="Seguir">Siguiendo</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestiona(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\')" placeholder="Seguir">Seguir</a>';
		}
   }
    else {
        if (isset($_GET['editar'])) $html .= $form;
        else $html .= '<h1><a type="button" onclick="openPage(\'vistaUsuario.php?editar=true&id='  .$_SESSION['idUser'] . '\')">Editar</a></h1>';
        $html .= "</div>";
		if(!user::esArtista($id))
		{
			if (user::haSolicitado($id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitado</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitar Verificacion</a>';
		}
    }
    return $html;
}
?>

    <section id="contents" class="contentsUsuario">
        <?php
        if (isset($_GET['id'])) {
            include 'includes/Usuario.php';
            echo muestraInteraccion(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), $htmlform);
        }
        ?>
    </section>
