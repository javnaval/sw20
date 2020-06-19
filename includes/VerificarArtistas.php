<?php
namespace es\ucm\fdi\aw;
use es\ucm\fdi\aw\classes\classes\user as user;

$users = user::usersVerificar();

echo '<h1>ARTISTAS</h1>';
if ($users == null) echo "<p>No hay artistas que verificar.</p>";
else {
    foreach ($users as $user) {
    echo '<div class="art">';
    echo '<div class="imagen"><img src="server/users/images/'. $user->getId() .'.png"></div>';
    echo '<div class="texto"><h3>' . $user->getUser() . '</h3><p>Nombre: ' .$user->getName(). '</p><p>' . $user->getDescripcion(). '</p></div>';
	if(user::esGestor($_SESSION['idUser'])) echo '<div class="verificar"><a onclick="verificarArtista(\'' . $user->getId() . '\')">Verificar</a></div>';
    echo '</div>';

    }
}