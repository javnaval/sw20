<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\contenidos as contenidos;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function muestraPlaylist($idPlaylist){
    $html = "";
        //require 'includes/procesarBusqueda.php';
	// $contiene = (new contenidos())->get();
		//	   foreach ($contiene as $row) {
			//	if($row->getIdPlaylist()==$idPlaylist){
				//   echo "<div>";
				 //$id= $row->getIdSong();	
				  // $titulo=$row->getTitle();
				 //  echo "<a href='vistaCancion.php?tituloc=$var&id=$idPlaylist'>$titulo</a>"; 
					//echo "<img src='server/images/Colores.jpg'>						
										
					  //</div>";
				 //echo	muestraCancion();
					  //}
			//   }
			$songs = ((new songs())->join("songs.id","contiene","contiene.idSong"))
			->join("Playlist.id","Playlist","contiene.idPlaylist")->where("idPlaylist","=","contiene.idPlaylist")->get();
			foreach ($songs as $row){
			$titulo=$row->getTitle();
			echo $titulo;
			}
    return $html;
}

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <title>Cancion</title>
</head>
<body>
<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>
    <section id="contents" class="contents">
        <?php
		//$var=$_GET['tituloc'];
		//$var=filter_input(INPUT_GET,'tituloc',FILTER_SANITIZE_STRING);
		$idPlaylist=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
		//$idCancion=$_GET['id'];

        echo muestraPlaylist($idPlaylist);
        ?>
    </section>

    <footer>
        <?php
        require 'includes/handlers/footer.php';
        ?>
    </footer>

</div>

</body>
</html>