<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles-header.css"/>
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['busqueda'])) {
            echo'<form action = "vistaInicio.php?pag=2&busqueda=true" method = "post" >
            <input type = "search" name = "busqueda" placeholder = "Buscar artistas, canciones o álbumes" >
            <input type = "submit" name = "Buscar" value = "Buscar" >
            </form >';
        }
        ?>
</body>
</html>
