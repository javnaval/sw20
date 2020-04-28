<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
function muestraUsuario($cor, $us, $nom, $rol){
    $html = "";
    
	echo "<img src='server/images/user.png'>";
	echo $cor;
	echo $us;
	echo $nom;
	echo $rol;
	
    return $html;
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
		
       
		$us=  user::getUser();
		$nom= user::getName();
		$cor= user::getEmail();
		$rol= user::getRol();
        echo muestraUsuario($cor, $us, $nom, $rol);
		
        ?>

		<button type="button" onclick="actualizarCuenta()">Editar</button>

    </section>

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>

</body>
</html>