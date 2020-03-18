
<form action="procesarUpload.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_POST['artista'])) {
        echo "<input type=\"text\" name=\"artista\" placeholder=\"Artista\" value= ".$_POST['artista']." required>";
    }
    else echo "<input type=\"text\" name=\"artista\" placeholder=\"Artista\" required>";
    ?>
    <input type="file" name="archivo" required>
    <input type="submit" name="Subir" value="Subir">
</form>