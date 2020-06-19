<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\SongsForum;

class forum {
    public static $className = "forum";

    private $id;
    private $idUser;
    private $idSong;
    private $titulo;

    public function __construct($id,$idUser,$idSong,$titulo){
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idSong = $idSong;
        $this->titulo = $titulo;
    }
    public function getId() {
        return $this->id;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdSong() {
        return $this->idSong;
    }

    public function getTitutlo() {
        return $this->titulo;
    }


    public function toString(){
        return[
            "idUser"      => "".$this->idUser."",
            "idSong"      => "".$this->idSong."",
            "titulo"       => "".$this->titulo.""
        ];
    }

    public static function buscaForosIdSong($id){
        $foros = (new songsForum())->where("idSong", "=", $id)->get();
        return $foros;
    }

    public static function crea($idCancion, $titulo){
        return (new songsForum())->insert((new self(null,$_SESSION['idUser'], $idCancion, $titulo))->toString());
    }
    public static function buscaForosIdSongTitulo($id,$titulo){
        $foros = (new songsForum())->where("idSong", "=", $id)->where("titulo", "=", $titulo)->get();
        return $foros[0];
    }
}