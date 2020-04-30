<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;

	class album {
		public static $className = "album";

		
		 private $id;
         private $idArtist;
         private $title;
		 private $releaseDate;

		 public function __construct($id,$idArtist,$title,$releaseDate){
             $this->id = $id;
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
		public function toString(){
			return[
                "idArtist"       => "".$this->idArtist."",
                "title"          => "".$this->title."",
				"releaseDate"    => "".$this->releaseDate.""
			];
		}

        public static function buscaAlbumId($id){
		     $album = (new Albums())->where("id", "=", $id)->get();
		     return $album[0];
        }

        public static function mostrarAlbums($user){
            return (new Albums())->where("idArtist", "=", $user)->get();
        }

        public static function buscar($album){
            return (new Albums())->where("title", "LIKE", "%".$album."%")->get();
        }

        public static function crea($idArtist, $title, $releaseDate){
            return (new Albums())->insert((new self(NULL,$idArtist, $title, $releaseDate))->toString());
        }
   }
?>