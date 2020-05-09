<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Seguidores as Seguidores;


class seguidor {
    public static $className = "seguidor";

    private $idUser;
    private $idSeguidor;

    public function __construct($idUser,$idSeguidor){
        $this->idUser = $idUser;
        $this->idSeguidor = $idSeguidor;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdSeguidor() {
        return $this->idSeguidor;
    }

    public function toString(){
        return[
            "idUser"      => "".$this->idUser."",
            "idSeguidor"  => "".$this->idSeguidor.""
        ];
    }

    public static function seguir($id, $idSeguir){
        (new Seguidores())->insert((new self($id,$idSeguir))->toString());
    }
}