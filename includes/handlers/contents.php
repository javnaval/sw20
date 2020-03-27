<?php
require_once("classes/classes/album.php");
require_once("classes/databaseClasses/Albums.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
     <title>Document</title>
</head>
<body>
    <section id="contents" class="contents">
       <?php
       if (isset($_GET['busqueda'])){
           if ($_GET['busqueda'] == true && isset($_POST['busqueda'])){
               require 'includes/procesarBusqueda.php';
           }
           else echo "Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.";
       }
       else {
           $albums = (new Albums())->get();
           foreach ($albums as $row) {
               echo "<div>";
               echo $row->getTitle();
               echo "<img src='server/images/Colores.jpg'>
                  </div>";
           }
       }
       ?>
    </section>
</body>
</html>