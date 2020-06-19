<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
if (!user::esArtista($_SESSION['idUser'])){
    header("Location: vista.php");
}
$form = new es\ucm\fdi\aw\FormularioCrearNoticia();
$html = $form->gestiona();
?>

    <section id="contentsCrearNoticia" class="contentsCrearNoticia">
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
	 $(document).ready(function(){
	  $("#form-crearNoticia").bind("submit",function(){
        var fd = new FormData(this);
        var btnEnviar = $("#bntEnviarNoticia");
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
            data: new FormData(this),
            processData: false,  
            contentType: false,  
			beforeSend: function(){
				btnEnviar.val("Subiendo");
				btnEnviar.attr("disabled","disabled");
			},
			complete:function(data){
				btnEnviar.val("subir");
				btnEnviar.removeAttr("disabled");
			},
			success: function(data){
				openPage('vistaCrearNoticia.php');
			},
			error: function(data){
				alert("Problemas al tratar de enviar el formulario");
			}
		});
		return false;
	});
});
</script>
