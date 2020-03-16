<?php
require_once("DAOArtista.php");

class claseArtista {
    private $artista;
    private $genero;
    private $descripcion;
    private $canciones;
    private $dao;

    public function __construct($artista = "", $genero = "", $descripcion = "", $canciones = array()) {
        $this->artista = $artista;
        $this->genero = $genero;
        $this->descripcion = $descripcion;
        $this->canciones = $canciones;
        $this->dao = new DAOArtista();
    }

    public function getArtista() {
        return $this->artista;
    }

    public function getCanciones() {
        return $this->canciones;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setArtista($artista) {
        $this->artista = $artista;
    }

    public function setCanciones($canciones) {
        $this->canciones = $canciones;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function buscar() {
        return $this->dao->buscar($this);
    }

    public function insertar() {
        return $this->dao->insertar($this);
    }

    public function eliminar() {
        $this->dao->eliminar($this);
    }
}