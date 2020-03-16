<?php
require_once("config.php");
require_once("DAO.php");
require_once("claseArtista.php");

class DAOArtista implements DAO{
    private $mysqli;

    public function __construct() {
        $singleton = Singleton::getSingleton();
        $this->mysqli = $singleton->connection();
    }

    public function buscarCanciones($artist) {
        $artista = $this->mysqli->real_escape_string($artist->getArtista());
        $query = "SELECT * FROM canciones WHERE artista = '$artista'";
        $result = $this->mysqli->query($query);
        $canciones = array();
        while ($res = $result->fetch_object()) {
            $canciones[] = new claseCancion($res->cancion, $res->artista, $res->album, $res->user, $res->ruta);
        }
        $artist->setCanciones($canciones);
    }

    public function buscar($artist) {
        $artista = $this->mysqli->real_escape_string($artist->getArtista());
        $query = "SELECT * FROM artistas WHERE artista LIKE '%$artista%'";
        $result = $this->mysqli->query($query);
        $artistas = array();
        while ($res = $result->fetch_object()) {
            $artistas[] = new claseArtista($res->artista, $res->genero, $res->descripcion);
        }
        return $artistas;
    }

    public function insertar($artist)
    {
        // TODO: Implement insertar() method.
    }

    public function eliminar($artist)
    {
        // TODO: Implement eliminar() method.
    }
}