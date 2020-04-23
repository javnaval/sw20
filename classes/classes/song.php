<?php

	class song  {

        public static $className = "song";

        
		 private $id;
		 private $title;
         private $duration;
		 private $played;
		 private $idUser;
		 private $idArtist;
		 private $idAlbum;

		 public function __construct($id = null,$title = null,$duration = null, $played = null,$idUser = null,$idArtist = null,$idAlbum = null){
             $this->id = $id;
             if($id == null){
               $this->$id = uniqid();
             }
             $this->title = $title;
             $this->played = $played;
             $this->idUser = $idUser;
             $this->idArtist = $idArtist;
             $this->idAlbum = $idAlbum;
		 }

		 public function getId(){
			 return $this->id;
		 }

		 public function getTitle(){
			 return $this->title;
		 }

		 public function getDuration(){
			 return $this->duration;
         }

         public function getPlayed(){
             return $this->played;
		 }

         public function getIdUser(){
             return $this->idUser;
         }

         public function getIdArtist(){
             return $this->idArtist;
         }

         public function getIdAlbum(){
             return $this->idAlbum;
         }
         public function getThis($row = null,$id = null,$title = null,$duration = null, $played = null,$idUser = null,$idArtist = null,$idAlbum = null){
            if($row != null){
               return new self($row["id"],$row["title"],$row["duration"],$row["played"],$row["idUser"],$row["idArtist"],$row["idAlbum"]);
            }
            return new self($id,$title,$duration,$played,$idUser,$idArtist,$idAlbum);
         }

        public function toString(){
            return[
              "id"           => "".$this->id."",
              "title"        => "".$this->title."",
              "duration"     => "".$this->duration."",
              "played"        => "".$this->played."",
              "idUser"        => "".$this->idUser."",
              "idAlbum"        => "".$this->idAlbum.""
            ];
        }

        public static function crea($title, $idUser, $idArtist, $idAlbum){
            return databaseFactory::getTable("songs")->insert(classesFactory::getClass("song")->getThis(null,null,$title, "VACIO", $idUser, $idArtist, $idAlbum));
        }

	}
?>