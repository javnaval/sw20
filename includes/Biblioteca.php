<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\playList as playList;
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
	      <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
     <title>Document</title>
</head>
<body>
    <section id="contents" class="contents">
       <?php
//assert(is_string($_POST['busqueda']), "Error al introducir los datos");
//$buscar = htmlspecialchars(trim(strip_tags($_POST['busqueda'])));
//$canciones = databaseFactory::getTable("songs")->where("title", "LIKE", "%".$buscar."%")->get();
//echo "<header>";
	//			require 'includes/handlers/header.php';
		//		echo "</header>";

 $songs = (new songs())->get();
			   foreach ($songs as $row) {
				if($row->getIdUser()==$_SESSION['idUser']){
				   echo "<div>";
				 $id= $row->getId();	
				   $titulo=$row->getTitle();
				   echo "<a href='vistaCancion.php?tituloc=$titulo&id=$id'>$titulo</a>"; 
					echo "<img src='server/images/Colores.jpg'>						
										
					  </div>";
					  }
			   }
			   
  $playlists=(new PlayLists())->get();
				 foreach ($playlists as $row) {
				if($row->getIdUser()==$_SESSION['idUser']){
				   echo "<div>";
				 $id= $row->getId();	
				   $titulo=$row->getTitle();
				   //echo "<a href='vistaCancion.php?tituloc=$titulo&id=$id'>$titulo</a>"; 
				   echo $titulo;
					echo "<img src='server/images/Colores.jpg'>						
										
					  </div>";
					  }
			   }
		  ?>							

    </section>
</body>
</html>