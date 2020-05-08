<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;


class Comentarios extends Crud {
    private $properties = [
        "idUser"    => "NOT NULL",
        "idCancion" => "NOT NULL",
        "text"      => "NOT NULL",
    ];
    public function __construct(){
        parent::__construct("comentarios",$this->properties);
    }
}