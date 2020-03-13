<?php
require_once("config.php");
if (isset($_SESSION)) session_destroy();
unset($_SESSION);
require("index.php");