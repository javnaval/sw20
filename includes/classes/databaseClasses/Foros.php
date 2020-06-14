<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\foro as foro;


class Foros extends Crud {
    private $properties = [
        "idUser"        => "NOT NULL",
        "idSong"        => "NOT NULL",
        "titulo"         => "NOT NULL"
    ];
    public function __construct(){
        parent::__construct("foros",$this->properties);
    }
    public function get(){
        $arrayPDO = parent::get();
        $array = null;
        foreach($arrayPDO as $row){
            $array[] = new foro($row["id"],$row["idUser"],$row["idSong"],$row["titulo"]);
        }
       return $array;
    }
}