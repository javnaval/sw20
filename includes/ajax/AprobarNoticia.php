<?php
require_once '../config.php';
use es\ucm\fdi\aw\classes\classes\noticia as noticia;



$idNoticia = htmlspecialchars(trim(strip_tags($_POST['idNoticia'])));

    $noticia = noticia::buscaNoticiaId($idNoticia);
    $noticia->setAccepted(1);
    $noticia->update($noticia);

