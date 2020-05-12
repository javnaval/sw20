<?php
require_once 'includes/config.php';

use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioEditarPerfil();
$htmlform = $form->gestiona();

if (isset($_GET['id']))
$usuario = user::buscaUsuarioId(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
else $usuario = user::buscaUsuarioId($_SESSION['idUser']);

$id =$usuario->getId();
$user=$usuario->getUser();
$userName=$usuario->getName();
$userEmail=$usuario->getEmail();
$userRol=$usuario->getRol();
$userDesc=$usuario->getDescripcion();

function muestra($id,$user, $usName, $cor, $rol, $desc, $form){
    $html = "<div class=\"imagen\"><img src= 'images/user.png'></div>";
    $html .= "<div class=\"contenido\"><h3> Usuario: ";
    $html .= $user;
	$html .= "</h3> <h3>";
    $html .= "Nombre: ";
	$html .= $usName;
	$html .= "</h3> <h3>";
	$html .= "Correo electronico: ";
    $html .= $cor;
	$html .= "</h3> <h3>";
    $html .= "Rol: ";
    $html .= $rol;
	$html .= "</h3> <h3>";
	$html .= "Descripcion: ";
    $html .= $desc;
	$html .= " </h3><h3 id='seguidores'>";
	$seguidores = seguidor::buscaSeguidores($id);
	$siguiendo = seguidor::buscaSiguiendo($id);
	$html .= "Seguidores: ".count($seguidores);
    $html .= "</h3> <h3>";
    $html .= "Siguiendo: ".count($siguiendo);
    $html .= "</h3>";
    if (isset($_GET['id']))
	{
		if((filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT)) == $_SESSION['idUser'])
		{
			if (isset($_GET['editar'])) $html .= $form;
			else $html .= '<h1><a type="button" href="vistaUsuario.php?editar=true&id=' . $_SESSION['idUser'] . '">Editar</a></h1>';
		}
		else
        {
            if (seguidor::siguiendo($_SESSION['idUser'],$id)) echo '<a class="siguiendo" id="' .$id. '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$id. '\');actualizarSeguidores(\'' .$id. '\')" placeholder="Seguir">Siguiendo</a>';
            else echo '<a class="seguir" id="' .$id. '" onclick="seguir(\'' .$_SESSION['idUser']. '\',\'' .$id. '\');actualizarSeguidores(\'' .$id. '\')" placeholder="Seguir">Seguir</a>';
        }
	}
	else
	{
		if (isset($_GET['editar'])) $html .= $form;
		else $html .= '<h1><a type="button" href="vistaUsuario.php?editar=true&id=' . $_SESSION['idUser'] . '">Editar</a></h1>';
	}
	$html .= "</div>";
    return $html;
}

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-usuario.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <script type="text/javascript" src="includes/js/seguidores.js"></script>
    <title>Usuario</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <section id="contents" class="contents">
        <?php
        echo muestra($id,$user, $userName, $userEmail, $userRol, $userDesc, $htmlform);
        ?>
    </section>

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>

</body>
</html>