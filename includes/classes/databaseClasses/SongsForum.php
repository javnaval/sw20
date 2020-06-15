<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\forum as forum;


class SongsForum extends Crud {
    private $properties = [
        "idUser"        => "NOT NULL",
        "idSong"        => "NOT NULL",
        "titulo"         => "NOT NULL"
    ];
    public function __construct(){
        parent::__construct("SongsForum",$this->properties);
    }
    public function get(){
        $arrayPDO = parent::get();
        $array = null;
        foreach($arrayPDO as $row){
            $array[] = new forum($row["id"],$row["idUser"],$row["idSong"],$row["titulo"]);
        }
       return $array;
    }
}