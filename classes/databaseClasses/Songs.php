<?php
	class Songs extends GenericModel {
		 private $properties = [
			"id"       => "NOT NULL",
			"title"    => "NOT NULL",
			"duration" => "NOT NULL",
			"played"    => "NOT NULL",
             "idUser" => "NOT NULL",
             "idArtist" => "NOT NULL",
             "idAlbum" => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("Songs",$this->properties);
		 }


		 public function get() {
			$songsPDO = parent::get();
			foreach($songsPDO as $row){
				$arraySongs[] = new song($row['id'],$row['title'],$row['duration'],$row['played'],$row['idUser'],$row['idArtist'],$row['idAlbum']);
			}
			return $arraySongs;
		 }
	}
?>