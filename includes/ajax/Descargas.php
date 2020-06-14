<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\databaseClasses\Relations as Relations;
use es\ucm\fdi\aw\classes\classes\user as user;


 $idUser = htmlspecialchars(trim(strip_tags($_POST['idUser'])));
 $idSong = htmlspecialchars(trim(strip_tags($_POST['idSong'])));


 $usuario = user::buscaUsuarioId($_SESSION['idUser']);

 if(strcmp($usuario->getRol(), "premium") === 0){
     (new Relations("descargas"))->insert(["idUser" =>$idUser,
      "idSong" => $idSong]);
}

?>
