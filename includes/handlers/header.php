<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;


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
	<link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-inicio.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-album.css"/>
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles-cancion.css"/>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
	<script type="text/javascript" src="includes/js/main.js"></script>
	<script src="https://kit.fontawesome.com/9d868392d8.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://unpkg.com/wavesurfer.js"></script>
	<script type="text/javascript" src="includes/js/uploadDownload.js"></script>
	<script type="text/javascript" src="includes/js/widgetControl.js"></script>
	<script type="text/javascript" src="includes/js/swiper.min.js"></script>
</head>

<body>
	<div id="mainContainer">

		<div id="topContainer">

			<?php sidebar(); ?>

        <header class="buttons">
            <div class="history">
                <button id="volver" aria-hidden="true" onclick="goBack()" class="navegacion" title="Volver">
                    <svg viewBox="0 0 24 24" class="a-v">
                        <path fill="currentColor" d="M15.54 21.15L5.095 12.23 15.54 3.31l.65.76-9.555 8.16 9.555 8.16"></path>
                    </svg
                </button>
                <button id="avanzar" aria-hidden="true" onclick="goForward()" class="navegacion" title="Avanzar">
                    <svg viewBox="0 0 24 24" class="a-v">
                        <path fill="currentColor" d="M7.96 21.15l-.65-.76 9.555-8.16L7.31 4.07l.65-.76 10.445 8.92"></path>
                    </svg>
                </button>
            </div>
        </header>

        <script>
            window.onload = function() {
                adjust(<?php echo $_SESSION['nav'];?>, <?php echo $_SESSION['maxNav'];?>, <?php if (isset($_SESSION['h'])) {echo 1; unset($_SESSION['h']);} else echo 0; ?>);
            }
        </script>


        <div id="mainViewContainer">

				<div id="mainContent">
