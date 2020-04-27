<?php
namespace es\ucm\fdi\aw;

if (isset($_SESSION)) session_destroy();
unset($_SESSION);
header("Location: ../index.php");