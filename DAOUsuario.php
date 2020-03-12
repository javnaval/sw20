<?php
require_once("DAO.php");
require_once("claseUsuario.php");

class DAOUsuario implements DAO {

    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli('localhost', 'sounday', 'sounday2020', 'sounday');
        require_once("config.php");
    }

    public function insertar($user){
        $usuario = $this->mysqli->real_escape_string($user->getUser());
        $pass = $this->mysqli->real_escape_string($user->getPassword());
        $email = $this->mysqli->real_escape_string($user->getEmail());
        $query = "INSERT INTO usuarios VALUES ('$usuario', '$pass', '$email')";
        return ($this->mysqli->query($query));
    }

    public function buscar($user) {
        $user = $this->mysqli->real_escape_string($user);
        $query = "SELECT * FROM usuarios WHERE user = '$user' ";
        $result = $this->mysqli->query($query);
        $usuario = new claseUsuario();
        if ($res = $result->fetch_object()) {
            $usuario->setUser($res->user);
            $usuario->setPassword($res->password);
        }
        else $usuario = NULL;
        return $usuario;
    }

    public function eliminar ($user) {

    }
}