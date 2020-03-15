<?php
require_once("config.php");
require_once("DAO.php");
require_once("claseCancion.php");

class DAOCancion implements DAO {
    private $mysqli;

    public function __construct() {
        $singleton = Singleton::getSingleton();
        $this->mysqli = $singleton->connection();
    }

    public function insertar($song){
        $cancion = $this->mysqli->real_escape_string($song->getCancion());
        $artista = $this->mysqli->real_escape_string($song->getArtista());
        $album = $this->mysqli->real_escape_string($song->getAlbum());
        $user = $this->mysqli->real_escape_string($song->getUser());
        $ruta = $this->mysqli->real_escape_string($song->getRuta());
        $query = "INSERT INTO canciones VALUES ('$cancion', '$artista', '$album', '$user', '$ruta')";
        return ($this->mysqli->query($query));
    }

    public function buscar($song) {
        $cancion = $this->mysqli->real_escape_string($song->getCancion());
        $query = "SELECT * FROM canciones WHERE cancion LIKE '%$cancion%'";
        $result = $this->mysqli->query($query);
        $canciones = array();
        while ($res = $result->fetch_object()) {
            $canciones[] = new claseCancion($res->cancion, $res->artista, $res->album, $res->user, $res->ruta);
        }
        return $canciones;
    }

    public function eliminar ($song) {
        $cancion = $this->mysqli->real_escape_string($song->getCancion());
        $artista = $this->mysqli->real_escape_string($song->getArtista());
        $album = $this->mysqli->real_escape_string($song->getAlbum());
        $user = $this->mysqli->real_escape_string($song->getUser());
        $query = "DELETE FROM canciones WHERE cancion = '$cancion' AND artista = '$artista' AND album = '$album' AND user = '$user'";
        $this->mysqli->query($query);
    }
}