<?php
	class album {
		public static $className = "album";

		
		 private $id;
		 private $releaseDate;
		 private $title;
		 private $idArtist;

		 public function __construct($id = null,$releaseDate = null,$title = null,$idArtist = null){
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
		public function getThis($row = null,$id = null,$releaseDate = null,$title = null,$idArtist = null){
			if($row != null){
			   return new self($row["id"],$row["releaseDate"],$row["title"],$row["idArtist"]);
			}
			return new self($id,$releaseDate,$title,$idArtist);
		}
		public function toString(){
			return[
				"id"      => "".$this->id."",
				"releaseDate"    => "".$this->releaseDate."",
				"title"   => "".$this->title."",
				"idArtist"  => "".$this->idArtist.""
			];
		}
   }
?>