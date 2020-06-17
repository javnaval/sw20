<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");  

use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

function muestra($id, $seg){
    $users = '';
    if ($seg == 'true') {
        $users = seguidor::buscaSeguidores($id);
        foreach ($users as $user) {
            $user = user::buscaUsuarioId($user['idSeguidor']);
            echo '<div class="seguidor">';
            echo "<a onclick=\"openPage('vistaUsuario.php?id="  .$user->getId() . "')\" class='seg'><img src='server/users/images/". $user->getId() .".png'>";
            echo '<p class="ur">' . $user->getUser() . '</p><p>' . $user->getName() . '</p>';
            echo '</a>';
            if ($user->getId() == $_SESSION['idUser']) echo "<p class='tu'>Tu</p>";
            else {
                if (seguidor::siguiendo($_SESSION['idUser'], $user->getId())) echo '<a class="siguiendo" id="' . $user->getId() . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $user->getId() . '\')" placeholder="Seguir">Siguiendo</a>';
                else echo '<a class="seguir" id="' . $user->getId() . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $user->getId() . '\')" placeholder="Seguir">Seguir</a>';
            }
            echo '</div>';
        }
    }
    else {
        $users = seguidor::buscaSiguiendo($id);
        foreach ($users as $user) {
            $user = user::buscaUsuarioId($user['idUser']);
            echo '<div class="seguidor">';
            echo "<a onclick=\"openPage('vistaUsuario.php?id=".$user->getId()."')\" class='seg'>";
            echo "<img src='server/users/images/". $user->getId() .".png'>";
            echo '<p class="ur">' . $user->getUser() . '</p><p>' . $user->getName() . '</p>';
            echo '</a>';
            if ($user->getId() == $_SESSION['idUser']) echo "<p class='tu'>Tu</p>";
            else {
                if (seguidor::siguiendo($_SESSION['idUser'], $user->getId())) echo '<a class="siguiendo" id="' . $user->getId() . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $user->getId() . '\')" placeholder="Seguir">Siguiendo</a>';
                else echo '<a class="seguir" id="' . $user->getId() . '" onclick="seguir(\'' . $_SESSION['idUser'] . '\',\'' . $user->getId() . '\')" placeholder="Seguir">Seguir</a>';
            }
            echo '</div>';
        }
    }
}

?>


    <section id="contents" class="contentsSeguidores">
        <?php
        if (isset($_GET['id']) && isset($_GET['seg'])) {
            echo muestra(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT),
                htmlspecialchars(trim(strip_tags($_GET['seg']))));
        }
        ?>
    </section>
