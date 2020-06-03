<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;



if (isset($_GET['id']))
    $usuario = user::buscaUsuarioId(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
else $usuario = user::buscaUsuarioId($_SESSION['idUser']);

if($usuario ==null) {
    echo "ERROR::No existe el usuario";
    exit;
}

echo "<div class=\"imagen\"><img src= 'images/user.png'></div>";
echo "<div class=\"contenido\"><h3> Usuario: ";
echo $usuario->getUser();
echo "</h3> <h3>";
echo "Nombre: ";
echo $usuario->getName();
echo "</h3> <h3>";
echo "Correo electronico: ";
echo $usuario->getEmail();
echo "</h3> <h3>";
echo "Rol: ";
echo $usuario->getRol();
echo "</h3> <h3>";
echo "Descripcion: ";
echo $usuario->getDescripcion();
echo " </h3><h3 id='seguidores'>";
$seguidores = seguidor::buscaSeguidores($usuario->getId());
$siguiendo = seguidor::buscaSiguiendo($usuario->getId());
echo "Seguidores: ".count($seguidores);
echo "</h3> <h3>";
echo "Siguiendo: ".count($siguiendo);
echo "</h3>";
$rol = $usuario->getRol();