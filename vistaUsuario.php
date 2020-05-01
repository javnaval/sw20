<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Users as Users;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
 $_GET["busquedaUsuario"] = "1"; //para probar

$usuarios = new Users();
$usuarios = $usuarios->where("id", "=" , 
$_GET["busquedaUsuario"])->get();
$usuario="";
foreach($usuarios as $us) {
    $usuario=$us;
}
$userId=$usuario->getId();
$userName=$usuario->getName();
$userEmail=$usuario->getEmail();
$userRol=$usuario->getRol();
$userDesc=$usuario->getDescripcion();

function muestraUsuario($cor, $us, $nom, $rol, $id){
    echo "<img src= 'server/images/users/";
    echo $id;
    echo ".png'>";
    echo "<h1> ";
    echo $nom;
    echo " </h1> ";
    echo $cor; 
    echo ", ";
    echo $rol;  
    echo $us;
}

function actualizarCuenta(){
	$form = new es\ucm\fdi\aw\FormularioEditarPerfil();
    echo $form->gestiona();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Usuario</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        require 'includes/handlers/sidebarLeft.php';
        ?>
    </nav>

    <section id="contents" class="contents">
        <?php
        echo muestraUsuario($userEmail, $userDesc, $userName, $userRol, $userId);
        ?>
        <h1>
		<button type="button" onclick="actualizarCuenta()">Editar</button>
        </h1>
    </section>

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>

</body>
</html>