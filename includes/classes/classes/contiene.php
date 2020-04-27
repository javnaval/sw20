<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\factories\classesFactory as classesFactory;

class contiene {
    public static $className = "contiene";

    private $idSong;
    private $idPlaylist;

    public function __construct($idSong = null,$idPlaylist = null){
        $this->idSong = $idSong;
        $this->idPlaylist = $idPlaylist;
    }

    public function getIdSong() {
        return $this->idSong;
    }

    public function getIdPlaylist() {
        return $this->idPlaylist;
    }

    public function getThis($row = null,$idSong = null,$idPlaylist = null){
        if($row != null){
            return new self($row["idSong"],$row["idPlaylist"]);
        }
        return new self($idSong,$idPlaylist);
    }

    public function toString(){
        return[
            "idSong"      => "".$this->idSong."",
            "idPlaylist"  => "".$this->idPlaylist.""
        ];
    }
}