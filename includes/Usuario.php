<?php
namespace es\ucm\fdi\aw;
require_once 'Application.php';
use es\ucm\fdi\aw\classes\classes\user as user;

class Usuario{

	private static function actualiza($usuario, $email, $name, $idUser){
        $app = Aplicacion::getSingleton();
        $conn = $app->connect();
        $query=sprintf("UPDATE INTO users(user, name, email) VALUES('%s', '%s', '%s')"
            , $usuario
            , $name
            , $email);
    }
}
?>