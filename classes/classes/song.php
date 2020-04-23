<?php

	class song  {

        public static $className = "song";

        
		 private $id;
         private $idUser;
         private $idAlbum;
		 private $title;
		 private $played;

		 public function __construct($id = null,$idUser = null,$idAlbum = null,$title = null,$played = null){
             $this->id = $id;
             if($id == null){
               $this->$id = uniqid();
             }
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

         public function getThis($row = null,$id = null,$idUser = null,$idAlbum = null,$title = null, $played = null){
            if($row != null){
               return new self($row["id"],$row["idUser"],$row["idAlbum"],$row["title"],$row["played"]);
            }
            return new self($id,$idUser,$idAlbum,$title,$played);
         }

        public function toString(){
            return[
              "id"           => "".$this->id."",
              "idUser"       => "".$this->idUser."",
              "idAlbum"      => "".$this->idAlbum."",
              "title"        => "".$this->title."",
              "played"       => "".$this->played.""
            ];
        }

        public static function crea($title, $idUser, $idAlbum){
            return databaseFactory::getTable("songs")->insert(classesFactory::getClass("song")->getThis(null,null, $idUser, $idAlbum, $title, 0));
        }

	}
?>