<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
$noticias = noticia::buscar($_SESSION['idUser']);

$noticiasHtml = "";
if ($noticias == null) echo "<p>Aún no tenemos noticias que mostrarle.</p>";
else{
$noticiasHtml .= "<div class='contenedor'>";
if(user::esArtista($_SESSION['idUser'])) $noticiasHtml .= '<div class="crearNoti"><a class="activar" onclick="openPage(\'vistaCrearNoticia.php\')">Crear noticia</a></div>';
		foreach ($noticias as $noticia) {
            $noticiasHtml .= "<div class='contenedor_tarjeta'>";
            if(user::esGestor($_SESSION['idUser'])) $noticiasHtml .= '<div class="aprobar"><a onclick="apruebaNoticia(\'' . $noticia->getId() . '\')">Aprobar</a></div>';
            $noticiasHtml .= "<figure id='tarjeta'>";
            $noticiasHtml .= "<img class='frontal' alt='' src='server/noticias/images/". $noticia->getId() .".jpg'>";
            $noticiasHtml .= "<figcaption id='trasera' class='trasera'>";
            $noticiasHtml .= "<h2 class='titulo'>".$noticia->getTitle()."</h2><hr>";
            $noticiasHtml .= "<h2 class='titulo'>Autor: ".(user::buscaUsuarioId($noticia->getIdUser()))->getName()."</h2><hr>";
            $noticiasHtml .= "<p>".$noticia->getTexto()."</p>";
            $noticiasHtml .= '</figcaption></figure></div>';
        }
    }
    $noticiasHtml .= "</div>";
?>
    <section id="contentsNoticia" class="contentsNoticia">
        <?php echo $noticiasHtml ?>
    </section>