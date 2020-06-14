<?php
require_once 'includes/config.php';


if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("header.php");
    include("footer.php");
   
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}
?>