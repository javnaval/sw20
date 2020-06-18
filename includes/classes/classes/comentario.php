<?php
namespace es\ucm\fdi\aw\classes\classes;

use es\ucm\fdi\aw\classes\databaseClasses\Comentarios;

class comentario {
    public static $className = "comentario";

    private $id;
    private $idUser;
    private $idSong;
    private $text;
    private $MeGusta;
    private $Respuesta;
    private $idForum;


    public function __construct($id,$idUser,$idSong,$text,$MeGusta,$Respuesta,$idForum){
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idSong = $idSong;
        $this->text = $text;
        $this->MeGusta = $MeGusta;
        $this->Respuesta = $Respuesta;
        $this->idForum = $idForum;

    }
    public function getId() {
        return $this->id;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdSong() {
        return $this->idSong;
    }

    public function getText() {
        return $this->text;
    }
    public function getMeGusta() {
        return $this->MeGusta;
    }
    public function setMeGusta($MG) {
         $this->MeGusta = $MG;
    }
    public function getForo() {
        return $this->idForum;
    }
    public function getRespuesta() {
        return $this->Respuesta;
    }

    public function toString(){
        return[
            "idUser"      => "".$this->idUser."",
            "idSong"      => "".$this->idSong."",
            "texto"       => "".$this->text."",
            "MeGusta"     => "".$this->MeGusta."",
            "Respuesta"   => "".$this->Respuesta."",
            "idForum"        => "".$this->idForum.""
        ];
    }
    public static function buscaComentariosIdSong($id){
        $comentarios = (new Comentarios())->where("idSong", "=", $id)->get();
        return $comentarios;
    }
    public static function buscaSongIbuscaComentariosIdSongComentariosdPlaylist($id,$idForo){
        $song = (new Comentarios())->join("Comentarios.idForum","songsForum","songsForum.id")->where("Comentarios.idSong","=",$id)->where("songsForum.id","=",$idForo)->get();
        return $song;
    }
    public static function buscaComentariosId($id){
        $comentarios = (new Comentarios())->where("id", "=", $id)->get();
        return $comentarios[0];
    }
    public static function crea($idCancion, $texto, $idComentaio,$idForo){
        return (new Comentarios())->insert((new self(NULL,$_SESSION['idUser'], $idCancion, $texto,0,$idComentaio,$idForo))->toString());
    }
    public static function actualizaMegustas($id,$comentario){
        (new Comentarios())->where("id","=",$id)->update($comentario->toString());
    }
	public static function buscaIdUser($id){
		return  (new Comentarios())->where("idUser", "=", $id)->get();
		//return $comentarios[0];
	}
    
}