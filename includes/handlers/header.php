<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\classes\user as user;

 if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
     header("Location: index.php");
 }
function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) include('sidebarLeftGestor.php');
    else include('sidebarLeft.php');
}

?>

<html>
<head>
    <meta charset="UTF-8">
	<title>Welcome to Sounday!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles-album.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-cancion.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-contents.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-crear-noticia.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-inicio.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-noticias.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-seguidores.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-usuario.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-biblioteca.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-ver-artistas.css"/>
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css"/>

	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">


	<script type="text/javascript" src="includes/js/bloquearUsuario.js"></script>
	<script type="text/javascript" src="includes/js/darGestor.js"></script>
	<script type="text/javascript" src="includes/js/eliminarCancion.js"></script>
	<script type="text/javascript" src="includes/js/history.js"></script>
	<script type="text/javascript" src="includes/js/main.js"></script>
	<script type="text/javascript" src="includes/js/seguidores.js"></script>
	<script type="text/javascript" src="includes/js/solicitarVerificacion.js"></script>
	<script type="text/javascript" src="includes/js/swiper.min.js"></script>
	<script type="text/javascript" src="includes/js/uploadDownload.js"></script>
	<script type="text/javascript" src="includes/js/widgetControl.js"></script>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://unpkg.com/wavesurfer.js"></script>
</head>

<body>
	<div id="mainContainer">

		<div id="topContainer">

			<?php sidebar(); ?>
			<?php include('navigation.php');?>

			<div id="mainViewContainer">

				<div id="mainContent">
