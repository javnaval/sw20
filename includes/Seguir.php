<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
require_once 'config.php';


$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$idSeguir = htmlspecialchars(trim(strip_tags($_POST['idSeguir'])));
$seguir = htmlspecialchars(trim(strip_tags($_POST['seguir'])));

if($seguir == 'true') seguidor::seguir($idSeguir, $id);
else seguidor::dejarSeguir($idSeguir, $id);