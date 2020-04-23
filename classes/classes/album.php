<?php
	class album {
		public static $className = "album";

		
		 private $id;
        private $idArtist;
        private $title;
		 private $releaseDate;

		 public function __construct($id = null,$idArtist = null,$title = null,$releaseDate = null){
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
		public function getThis($row = null,$id = null,$idArtist = null,$title = null,$releaseDate = null){
			if($row != null){
			   return new self($row["id"],$row["idArtist"],$row["title"],$row["releaseDate"]);
			}
			return new self($id,$idArtist,$title,$releaseDate);
		}
		public function toString(){
			return[
				"id"      => "".$this->id."",
                "idArtist"  => "".$this->idArtist."",
                "title"   => "".$this->title."",
				"releaseDate"    => "".$this->releaseDate.""
			];
		}
   }
?>