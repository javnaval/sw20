<?php


interface DAO {
    public function insertar($elem);
    public function buscar($elem);
    public function eliminar($elem);
}