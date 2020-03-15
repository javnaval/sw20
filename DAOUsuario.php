<?php
require_once("config.php");
require_once("DAO.php");
require_once("claseUsuario.php");

class DAOUsuario implements DAO {
    private $mysqli;

    public function __construct() {
        $singleton = Singleton::getSingleton();
        $this->mysqli = $singleton->connection();
    }

    public function insertar($user){
        $usuario = $this->mysqli->real_escape_string($user->getUser());
        $pass = $this->mysqli->real_escape_string($user->getPassword());
        $email = $this->mysqli->real_escape_string($user->getEmail());
        $query = "INSERT INTO usuarios VALUES ('$usuario', '$pass', '$email')";
        return ($this->mysqli->query($query));
    }

    public function buscar($user) {
        $usuario = $this->mysqli->real_escape_string($user->getUser());
        $query = "SELECT * FROM usuarios WHERE user = '$usuario' ";
        $result = $this->mysqli->query($query);
        if ($res = $result->fetch_object()) {
            $user->setUser($res->user);
            $user->setPassword($res->password);
            $user->setEmail($res->email);
        }
        else $user = null;
    }

    public function eliminar ($user) {
        $usuario = $this->mysqli->real_escape_string($user->getUser());
        $query = "DELETE FROM usuarios WHERE user = '$usuario'";
        $this->mysqli->query($query);
    }
}