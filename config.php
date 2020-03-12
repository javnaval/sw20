<?php
session_start();
$db = mysqli_connect('localhost', 'sounday', '', 'sounday');
$dao = new DAOUsuario();
