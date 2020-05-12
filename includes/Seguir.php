<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use http\Env\Response;
use http\Message\Body;

require_once 'config.php';

if (isset($_POST['actualizar'])){
    echo count(seguidor::buscaSeguidores($_POST['actualizar']));
}
else {
    $id = htmlspecialchars(trim(strip_tags($_POST['id'])));
    $idSeguir = htmlspecialchars(trim(strip_tags($_POST['idSeguir'])));
    $seguir = htmlspecialchars(trim(strip_tags($_POST['seguir'])));

    if ($seguir == 'true') seguidor::seguir($idSeguir, $id);
    else seguidor::dejarSeguir($idSeguir, $id);
}