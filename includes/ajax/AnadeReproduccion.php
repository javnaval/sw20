<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\song as song;

$id = htmlspecialchars(trim(strip_tags($_POST['songId'])));
$existe = song::buscaSongId($id);
$MG = 0;
  if(!empty($existe)){
    $MG = intval($existe->getPlayed());
    $MG++;
    $existe->setPlayed($MG);
    song::ActualizaPlayed($id,$existe);
  }
echo $id;

