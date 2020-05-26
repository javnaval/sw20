<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

if (!user::esArtista($_SESSION['idUser'])){
    header("Location: vistaInicio.php");
}

$form = new es\ucm\fdi\aw\FormularioCrearNoticia();
$html = $form->gestiona();
?>

    <!DOCTYPE html>
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-crear-noticia.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Crear noticia</title>
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
        echo $html;
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>
<script>
function validar(texto){

	if (texto.length <1){
		alert('El texto de la noticia es muy corto');
	}
	else if (texto.length >1000){
		alert('El texto de la noticia es muy largo');
	}
}
</script>
</body>
</html>
