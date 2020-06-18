<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Playlists as Playlists;

	class playlist  {
		public static $className = "playlist";

		
		 private $id;
		 private $idUser;
		 private $title;
		 
		 public function __construct($id, $idUser, $title){
             $this->id = $id;
             $this->idUser = $idUser;
             $this->title = $title;
		 }
		 public function getId(){
			 return $this->id;
		 }

        public function getIdUser() {
            return $this->idUser;
        }

		 public function getTitle(){
			 return $this->title;
		 }

		 public function toString(){
			return[
               "idUser"       => "".$this->idUser."",
			   "title"        => "".$this->title.""
			];
		 }
		public static function crea($idUser, $title){
            return (new Playlists())->insert((new self(null,$idUser, $title))->toString());
		}
		
		
        public static function playlistsUser($id){
            return (new Playlists())->where("idUser", "=", $id)->get();
        }

        public static function buscaPlaylistId($id){
            $playlist = (new Playlists())->where("id", "=", $id)->get();
            return $playlist[0];
        }
		public static function buscaTitlePlaylist($title){
            $playlist = (new Playlists())->where("title", "=", $title)->get();
            return $playlist[0];
        }

        public static function buscaTitlePlaylistUser($user, $title){
            $playlist = (new Playlists())->where("title", "=", $title)->where("idUser", "=", $user)->get();
            return $playlist[0];
        }

        public static function eliminar($id){
            (new Playlists())->where("id","=",$id)->delete();
        }
	}
?>