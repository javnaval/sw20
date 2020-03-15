<?php
require_once "config.php";
require_once "claseCancion.php";

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscar = new claseCancion(htmlspecialchars(trim(strip_tags($_POST['busqueda']))));
$_GET['canciones'] = $buscar->buscar();
require "vistaInicio.php";