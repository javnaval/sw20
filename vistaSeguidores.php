<?php
require_once 'includes/config.php';

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
            echo "<a href='vistaUsuario.php?id=".$user->getId()."' class='seg'><img src='server/users/images/". $user->getId() .".png'>";
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
            echo "<a href='vistaUsuario.php?id=".$user->getId()."' class='seg'><img src='server/users/images/". $user->getId() .".png'>";
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

function sidebar(){
    if (user::esGestor($_SESSION['idUser'])) require 'includes/handlers/sidebarLeftGestor.php';
    else require 'includes/handlers/sidebarLeft.php';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-seguidores.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles-navSidebarLeft.css"/>
    <script src="https://kit.fontawesome.com/9d868392d8.js"></script>
    <script type="text/javascript" src="includes/js/seguidores.js"></script>
    <script type="text/javascript" src="includes/js/darGestor.js"></script>
    <script type="text/javascript" src="includes/js/bloquearUsuario.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
    <script type="text/javascript" src="includes/js/history.js"></script>
    <title>Usuario</title>
</head>
<body>

<div id="container" class="wrapper">

    <nav>
        <?php
        sidebar();
        ?>
    </nav>

    <?php
    require 'includes/handlers/header.php';
    ?>

    <section id="contents" class="contents">
        <?php
        if (isset($_GET['id']) && isset($_GET['seg'])) {
            echo muestra(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT),
                htmlspecialchars(trim(strip_tags($_GET['seg']))));
        }
        ?>
    </section>

    <?php
    require 'includes/handlers/footer.php';
    ?>

</div>

</body>
</html>