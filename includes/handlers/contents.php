<?php
require_once("classes/classes/album.php");
require_once("classes/databaseClasses/Albums.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
     <title>Document</title>
</head>
<body>
    <section id="contents" class="contents">
       <?php
	   if (isset($_GET['pag'])){
		   if($_GET['pag'] == 2)
		   {
				echo "<header>";
				require 'includes/handlers/header.php';
				echo "</header>";
			   if (isset($_GET['busqueda'])){
				   if ($_GET['busqueda'] == true && isset($_POST['busqueda'])){
					   require 'includes/procesarBusqueda.php';
				   }
				   else echo "Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.";
			   }
		   }
		   elseif ($_GET['pag'] == 2){
			   $albums = (new Albums())->get();
			   foreach ($albums as $row) {
				   echo "<div>";
				   echo $row->getTitle();
				   echo "<img src='server/images/Colores.jpg'>
					  </div>";
			   }
		   }
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