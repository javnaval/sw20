<?php
echo php_ini_loaded_file();
echo phpinfo();

//configuracion para la subida de archivos
//https://code.tutsplus.com/es/tutorials/how-to-upload-a-file-in-php-with-example--cms-31763

//https://www.a2hosting.es/kb/developer-corner/php/using-php-directives-in-custom-htaccess-files/setting-the-php-maximum-upload-file-size-in-an-htaccess-file

//comprobacion
/*
if (isset($_FILES)) {
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    echo $_FILES['fileAudio']['error'];
    exit;
}*/