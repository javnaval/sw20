<?php
require_once "Singleton.php";

if (!isset($_SESSION)) session_start();
$singleton = Singleton::getSingleton();


