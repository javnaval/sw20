<?php


interface DAO {
    public function insertar($user);
    public function buscar($user);
    public function eliminar($user);
}