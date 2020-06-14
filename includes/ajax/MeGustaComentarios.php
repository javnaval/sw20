<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;
use es\ucm\fdi\aw\classes\classes\comentario as comentario;
use es\ucm\fdi\aw\classes\classes\user as user;
use es\ucm\fdi\aw\classes\databaseClasses\Comentarios as Comentarios;

$idUser = htmlspecialchars(trim(strip_tags($_POST['idUser'])));
$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$existe = (new Relations("MegustaComentarios"))->where("idComentarios","=",$id)->where("idUser","=",$idUser)->get();
$MG = 0;
$comentario = comentario::buscaComentariosId($id);

$usuario = user::buscaUsuarioId($_SESSION['idUser']);

if(strcmp($usuario->getRol(), "premium") === 0){
  if(empty($existe)){
    (new Relations("MeGustaComentarios"))->insert(["idUser" => $idUser,"idComentarios" => $id]);
    $MG = intval($comentario->getMeGusta());
    $MG++;
    $comentario->setMeGusta($MG);
    comentario::actualizaMegustas($MG,$comentario);
  }
  else{
    (new Relations("MeGustaComentarios"))->where("idComentarios","=",$id)->where("idUser","=",$idUser)->delete();
    $MG = intval($comentario->getMeGusta());
    $MG--;
    $comentario->setMeGusta($MG);
    comentario::actualizaMegustas($MG,$comentario);
  }
}