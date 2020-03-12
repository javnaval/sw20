<?php


class claseUsuario
{
private $user;
private $password;

public function getPassword() {
    return $this->password;
}

public function getUser() {
    return $this->user;
}

public function __construct($user = "", $password = "") {
    this.$user = $user;
    this.$password = $password;
}

}