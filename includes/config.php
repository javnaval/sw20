<?php
require_once 'Application.php';
if (!isset($_SESSION)) session_start();

define ('RUTA_RAIZ', '/AW/sw20/');
$settings =
    ["driver"   => "mysql",
        "host"     => "localhost",
        "database" => "sounday",
        "username" => "sounday",
        "password" => "sounday2020"];

$app = Application::getSingleton();
$app->init($settings, RUTA_RAIZ);