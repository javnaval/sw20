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