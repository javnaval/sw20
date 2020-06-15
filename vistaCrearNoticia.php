<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
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

    <section id="contents" class="contentsCrearNoticia">
        <?php
        echo $html;
        ?>
    </section>

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
