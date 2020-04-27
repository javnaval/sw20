<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\GenericModel as GenericModel;

class Contenidos extends GenericModel {
    public static  $tableName = "contiene";

    private $properties = [
        "idSong"    => "NOT NULL",
        "idPlaylist" => "NOT NULL"
    ];
    public function __construct(){
        parent::__construct("contiene","contiene",$this->properties);
    }
}