<?php
     require_once("classes/classes/album.php");
	 class Albums extends GenericModel {
		 private $properties = [
			"id"    => "NOT NULL",
			"releaseDate"  => "NOT NULL",
			"title" => "NOT NULL",
			"idArtist" => "NOT NULL"
		];
		 public function __construct(){
			 parent::__construct("Albums",$this->properties);
		 }
		 
		 public function get() {
			 $albumsPDO = parent::get();
			 foreach($albumsPDO as $row){
				 $arrayAlbums[] = new album($row['id'],$row['releaseDate'],$row['title'],$row['idArtist']);
			 }
			 return $arrayAlbums;
		 }
	}
?>