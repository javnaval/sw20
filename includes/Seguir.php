<?php
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;

$id = htmlspecialchars(trim(strip_tags($_GET['id'])));
$idSeguir = htmlspecialchars(trim(strip_tags($_GET['idSeguir'])));

seguidor::seguir($idSeguir, $id);