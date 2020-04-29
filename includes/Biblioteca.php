<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;

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
				   echo "<a href='vistaPlaylist.php?tituloc=$titulo&id=$id'>$titulo</a>";
				   //echo $titulo;
					echo "<img src='server/images/Colores.jpg'>						
										
					  </div>";
					  }
			   }