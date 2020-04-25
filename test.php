<?php
require_once "includes/config.php";
    echo ' <header> probando </header>';
   $rutaTest= Application::getSingleton()->getRutaRaiz();
    echo ' <header> ' ;
    echo $rutaTest ;
    echo '</header>';
    echo ' <header> ' ;
    $connection = Application::getSingleton()->connect(); 
     echo '</header>';
     echo $connection->query("SELECT title FROM `albums` WHERE id = 1")->fetch()[0];
    /*
    $album = databaseFactory::getTable("albums")->where("id", "=", "1")->get();
    echo ' < header >';
    echo $album->getTitle();
    echo '</header>';
    */
?>