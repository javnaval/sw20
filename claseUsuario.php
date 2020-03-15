<?php
require_once("DAOUsuario.php");

class claseUsuario {
    private $user;
    private $password;
    private $email;
    private $dao;

    public function __construct($user = "", $password = "", $email = "") {
        $this->user = $user;
        $this->password = $password;
        $this->email = $email;
        $this->dao = new DAOUsuario();
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUser() {
        return $this->user;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function buscar() {
        $this->dao->buscar($this);
    }

    public function insertar() {
        return $this->dao->insertar($this);
    }

    public function eliminar() {
        $this->dao->eliminar($this);
    }

}