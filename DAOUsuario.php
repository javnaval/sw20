<?php


class DAOUsuario implements DAO {
    private $db;
    public function __construct() {
        $db = mysqli_connect('localhost', 'root', '', 'pr4');
    }

    public function insertar($user){

    }

    public function buscar($user) {
        $sql = 'SELECT * FROM usuarios WHERE user = ? ';
        $consulta = mysqli_prepare($this->db, $sql);
        $ok = mysqli_stmt_bind_param($consulta, 's', $user);
        $ok = mysqli_stmt_execute($consulta);
        $ok = mysqli_stmt_bind_result($consulta, $password);
        while($ok != NULL) {
            mysqli_stmt_fetch($consulta);
            $ok = mysqli_stmt_bind_result($consulta, $password);
        }
        $usuario = new claseUsuario();
        return $usuario;
    }

    public function eliminar ($user) {

    }
}