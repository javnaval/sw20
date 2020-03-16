<?php
require_once "config.php";
require_once "claseCancion.php";
require_once "claseArtista.php";

assert(is_string($_POST['busqueda']), "Error al introducir los datos");
$buscarCancion = new claseCancion(htmlspecialchars(trim(strip_tags($_POST['busqueda']))));
$buscarArtista = new claseArtista(htmlspecialchars(trim(strip_tags($_POST['busqueda']))));
$_GET['canciones'] = $buscarCancion->buscar();
$_GET['artistas'] = $buscarArtista->buscar();

require "vistaInicio.php";