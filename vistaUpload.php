<?php
    require_once 'includes/config.php';
    include("includes/handlers/includedFiles.php");
    use es\ucm\fdi\aw\classes\classes\user as user;

    if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        header("Location: index.php");
    }
    $form = new es\ucm\fdi\aw\FormularioUpload();
    $html = $form->gestiona();

?>
    <section id="contents" class="contents">
        <?php
        echo $html;
        ?>
    </section>

<script>
	 $(document).ready(function(){
	  $("#form-upload").bind("submit",function(){
        var fd = new FormData(this);
        var btnEnviar = $("#btnEnviarUpload");
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
				openPage('vistaUpload.php');
			},
			error: function(data){
				alert("Problemas al tratar de enviar el formulario");
			}
		});
		return false;
	});
});
</script>