<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as songs;

	class song  {

        public static $className = "song";

        
		 private $id;
         private $idUser;
         private $idAlbum;
		 private $title;
		 private $played;

		 public function __construct($id,$idUser,$idAlbum,$title,$played){
             $this->id = $id;
             $this->idUser = $idUser;
             $this->idAlbum = $idAlbum;
             $this->title = $title;
             $this->played = $played;
		 }

		 public function getId(){
			 return $this->id;
		 }

        public function getIdUser(){
            return $this->idUser;
        }

        public function getIdAlbum(){
            return $this->idAlbum;
        }

		 public function getTitle(){
			 return $this->title;
		 }

         public function getPlayed(){
             return $this->played;
		 }

        public function toString(){
            return[
              "idUser"       => "".$this->idUser."",
              "idAlbum"      => "".$this->idAlbum."",
              "title"        => "".$this->title."",
              "played"       => "".$this->played.""
            ];
        }

        public static function crea($title, $idUser, $idAlbum){
            return (new Songs())->insert((new self(null, $idUser, $idAlbum, $title, 0))->toString());
        }

        public static function buscar($title){
            return (new Songs())->where("title", "LIKE", "%".$title."%")->get();
        }

	}
?>