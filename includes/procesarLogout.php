<?php
namespace es\ucm\fdi\aw;
require_once 'config.php';

if (isset($_SESSION)) session_destroy();
unset($_SESSION);
header("Location: ../index.php");