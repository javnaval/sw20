<?php
require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";

	class song extends GenericModel {
		 private $id;
		 private $title;
         private $duration;
		 private $played;
		 private $idUser;
		 private $idArtist;
		 private $idAlbum;

		 public function __construct($id = null,$title,$duration, $played,$idUser,$idArtist,$idAlbum){
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

	}
?>