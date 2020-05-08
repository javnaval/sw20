<?php
namespace es\ucm\fdi\aw\classes\classes;


class comentario {
    public static $className = "comentario";

    private $idUser;
    private $idCancion;
    private $text;

    public function __construct($idUser,$idCancion, $text){
        $this->idUser = $idUser;
        $this->idCancion = $idCancion;
        $this->text = $text;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdCancion() {
        return $this->idCancion;
    }

    public function getText() {
        return $this->text;
    }

    public function toString(){
        return[
            "idUser"      => "".$this->idUser."",
            "idCancion"   => "".$this->idCancion."",
            "text"        => "".$this->text.""
        ];
    }
}