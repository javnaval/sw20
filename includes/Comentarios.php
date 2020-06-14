<?php
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\comentario as comentario;
use es\ucm\fdi\aw\classes\classes\user as user;



function estrcuturaComentario($name,$text,$id,$idUser){
	$html = "";
	$html = "<div class='comment-avatar'><img src='images/Colores.jpg'></div><div class='comment-box'><div class='comment-head'>";
	$html .= "<h6 class='comment-name by-author'>".$name."</h6><i onclick='textComentario(\"".$_GET["id"]."\",\"".$id ."\",\"".$_GET["idForo"]."\")'  class='fa fa-reply'></i><i onclick='meGustaComentario(\"" . $idUser . "\",\"" . $id . "\")' class='fa fa-heart'></i></div><div class='comment-content'>";
	$html .= $text."</div></div>";
	return $html;

}

function muestraComentarios($idCancion,$idForo){
	$html = "";
	$htmlSub = "";
	$i = 0;
	$comentarios = comentario::buscaSongIbuscaComentariosIdSongComentariosdPlaylist($idCancion,$idForo);
	$html .=  "<div class='comments-container'><ul id='comments-list' class='comments-list'>";
	if($comentarios !== null){
		foreach($comentarios as $comentario){
			$htmlSub = "<ul class='comments-list reply-list'>";
			$user = user::buscaUsuarioId($comentario->getIdUser());
			if($comentario->getRespuesta() == 0){
				$html .= "<li> <div class='comment-main-level'>" . estrcuturaComentario($user->getName(),$comentario->getText(),$comentario->getId(),$_SESSION['idUser']) ."</div>";
				foreach($comentarios as $comentarioSub){
					$userSub = user::buscaUsuarioId($comentarioSub->getIdUser());
					if($comentarioSub->getRespuesta() == $comentario->getId()){
						$i++;
						$htmlSub .= "<li>". estrcuturaComentario($userSub->getName(),$comentarioSub->getText(),$comentario->getId(),$_SESSION['idUser']) . "</li>";
					}
				}
				if($i > 0){
					$html .= $htmlSub . "</ul></li>";
				}
			}
		}
		$html .= "</ul></div>";
	}
	return $html ;
}
echo muestraComentarios($_GET["id"],$_GET["idForo"]);
?>