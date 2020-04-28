<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Contenidos as Contenidos;

class contiene {
    public static $className = "contiene";

    private $idSong;
    private $idPlaylist;

    public function __construct($idSong,$idPlaylist){
        $this->idSong = $idSong;
        $this->idPlaylist = $idPlaylist;
    }

    public function getIdSong() {
        return $this->idSong;
    }

    public function getIdPlaylist() {
        return $this->idPlaylist;
    }

    public function toString(){
        return[
            "idSong"      => "".$this->idSong."",
            "idPlaylist"  => "".$this->idPlaylist.""
        ];
    }
}