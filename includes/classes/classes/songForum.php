<?php
namespace es\ucm\fdi\aw\classes\classes;

	class songForum  {

        public static $className = "songForum";

        
         private $id;
         private $idSong;
         private $idUser;
         private $text;

		 public function __construct($id,$idSong,$idUser,$text){
             $this->id = $id;
             $this->idSong = $idSong;
             $this->idUser = $idUser;
             $this->text = $text;
		 }

		public function getId(){
			 return $this->id;
         }

        public function getIdSong(){
            return $this->idSong;
        }

        public function getText(){
            return $this->text;
        }

        public function getIdUser(){
            return $this->idUser;
        }

        public function toString(){
            return[
              "idUser: "       => "".$this->idUser."",
              "text"      => "".$this->text.""
            ];
        }

        public static function buscaSongId($id){
            $songForum = (new SongForum())->where("id", "=", $id)->get();
            return $songForum[0];
        }

        public static function crea( $idUser, $text){
            return (new SongForum())->insert((new self(null,$idSong, $idUser, $text))->toString());
        }

        public function eliminar(){
            (new SongForum())->where("id","=",$this->id)->delete();
        }

	}
?>