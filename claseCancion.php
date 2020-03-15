<?php
require_once("DAOCancion.php");

class claseCancion {
    private $cancion;
    private $artista;
    private $album;
    private $user;
    private $ruta;
    private $dao;

    public function __construct($cancion = "", $artista = "", $album = "",  $user = "", $ruta = "") {
        $this->cancion = $cancion;
        $this->artista = $artista;
        $this->album = $album;
        $this->user = $user;
        $this->ruta = $ruta;
        $this->dao = new DAOCancion();
    }

    public function getArtista() {
        return $this->artista;
    }

    public function getCancion() {
        return $this->cancion;
    }

    public function getAlbum() {
        return $this->album;
    }

    public function setArtista($artista) {
        $this->artista = $artista;
    }

    public function setCancion($cancion) {
        $this->cancion = $cancion;
    }

    public function setAlbum($album) {
        $this->album = $album;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function setruta($ruta) {
        $this->ruta = $ruta;
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