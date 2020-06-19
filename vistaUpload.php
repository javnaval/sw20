<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\classes\classes\user as user;

    if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
        header("Location: index.php");
    }
    $form = new es\ucm\fdi\aw\FormularioUpload();
    $html = $form->gestiona();
    include("includes/handlers/includedFiles.php");

?>
    <section id="contents" class="contents">
        <?php
        echo $html;
        ?>
    </section>

<script type="application/javascript">
    $(document).ready(function () {
        $("#form-upload").bind("submit",function(){
            var formData = new FormData(document.getElementById("form-upload"));
            formData.append("dato", "valor");
            var subir = $("#subir");
            $.ajax({
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data:formData,
                beforeSend: function(){
                    subir.attr("disabled","disabled");
                },
                complete:function(data){
                    subir.removeAttr("disabled");
                },
                success: function(data){
                    $(".respuesta").html(data);
                },
                error: function(data){
                    alert("Problemas al tratar de enviar el formulario");
                }
            });
            return false;
        });
    });
</script>