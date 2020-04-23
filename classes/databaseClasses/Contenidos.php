<?php
require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";

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