<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\comentario as comentario;

class Comentarios extends Crud {
    private $properties = [
        "idUser"        => "NOT NULL",
        "idSong"        => "NOT NULL",
        "texto"         => "NOT NULL",
        "MeGusta"       => "NOT NULL",
        "Respuesta"     => "NOT NULL",
        "idForo"        => "NOT NULL"
    ];
    public function __construct(){
        parent::__construct("Comentarios",$this->properties);
    }

    public function get(){
        $arrayPDO = parent::get();
        $array = null;
        foreach($arrayPDO as $row){
            $array[] = new comentario($row["id"],$row["idUser"],$row["idSong"],$row["texto"],$row["MeGusta"],$row["Respuesta"],$row["idForo"]);
        }
       return $array;
    }

}