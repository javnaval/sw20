<?php
require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class album extends GenericModel {
		 private $id;
		 private $releaseDate;
		 private $title;
		 private $idArtist;

		 public function __construct($id = null,$releaseDate,$title,$idArtist){
             $this->id = $id;
             if($id == null){
                $this->$id = uniqid();
             }
             $this->releaseDate = $releaseDate;
             $this->title = $title;
             $this->idArtist = $idArtist;
		 }

		 public function getId(){
			 return $this->id;
		 }

		 public function getReleaseDate(){
			 return $this->releaseDate;
		 }

		 public function getTitle(){
			 return $this->title;
		 }

        public function getIdArtist(){
            return $this->idArtist;
        }

	}
?>