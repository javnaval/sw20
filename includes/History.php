<?php
if (!isset($_SESSION)) session_start();
if ($_SESSION['nav'] > $_SESSION['maxNav']) $_SESSION['nav'] = $_SESSION['maxNav'];
if (isset($_POST['add'])){
    $_SESSION['nav']++;
    $_SESSION['maxNav'] = $_SESSION['nav'];
}
else {
    $_SESSION['h'] = true;
    if ($_POST['h'] === 'true') $_SESSION['nav']--;
    else {
        $_SESSION['nav']++;
    }
}