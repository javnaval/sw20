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

    public static function buscaSeguidores($id){
        return (new Seguidores())->where("idUser", "=", $id)->get();
    }

    public static function buscaSiguiendo($id){
        return (new Seguidores())->where("idSeguidor", "=", $id)->get();
    }

    public static function seguir($id, $idSeguidor){
        (new Seguidores())->insert((new self($id,$idSeguidor))->toString());
    }

    public static function dejarSeguir($id, $idSeguidor){
        (new Seguidores())->where("idUser", "=", $id)->where("idSeguidor", "=", $idSeguidor)->delete();
    }

    public static function siguiendo($idUser, $idSeguir){
        return (new Seguidores())->where("idUser", "=", $idSeguir)->where("idSeguidor", "=", $idUser)->get() != null;
    }
}