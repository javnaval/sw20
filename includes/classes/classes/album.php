<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\factories\classesFactory as classesFactory;

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

        public static function buscaAlbumId($id){
		     $album = databaseFactory::getTable("albums")->where("id", "=", $id)->get();
		     return $album[0];
        }

        public static function mostrarAlbums($user){
            return databaseFactory::getTable("albums")->where("idArtist", "=", $user)->get();
        }

        public static function buscar($album){
            return databaseFactory::getTable("albums")->where("title", "LIKE", "%".$album."%")->get();
        }
   }
?>