<?php
require_once 'Application.php';
if (!isset($_SESSION)) session_start();

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

define ('RUTA_RAIZ', '/AW/sw20/');
$settings =
    ["driver"   => "mysql",
        "host"     => "localhost",
        "database" => "sounday",
        "username" => "root",
        "password" => ""];

$app = Application::getSingleton();
$app->init($settings, RUTA_RAIZ);