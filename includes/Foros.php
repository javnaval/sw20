<?php
require_once 'config.php';
use es\ucm\fdi\aw\classes\classes\forum as forum;
use es\ucm\fdi\aw\classes\classes\user as user;

$idCancion = htmlspecialchars(trim(strip_tags($_GET['idCancion'])));

$usuario = user::buscaUsuarioId($_SESSION['idUser']);
echo "<p>Foros:</p>";
$listaForos = "";
$foros = forum::buscaForosIdSong($idCancion);
$listaForos .= "<ul>";
if ($foros !== null) {
    foreach ($foros as $foro) {
        $listaForos .= "<li onclick='mostrarComentarios(3,1)'><p>" . $foro->getTitutlo() . "</p></li>";
    }
    $listaForos .= "</ul>";
}
echo $listaForos;
?>