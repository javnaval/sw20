<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;

class Seguidores extends Crud{
    private $properties = [
        "idUser"     => "NOT NULL",
        "idSeguidor" => "NOT NULL"
    ];
    public function __construct(){
        parent::__construct("seguidores",$this->properties);
    }
}