<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

require_once 'config.php';

$idNoticia = htmlspecialchars(trim(strip_tags($_POST['id'])));

    $noticia = noticia::buscaNoticiaId($idNoticia);
    $noticia->setAccepted('1');
    $noticia->update($noticia);
