<?php

require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class Songs extends GenericModel {
		public static $tableName = "songs";
		
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
			 parent::__construct("songs","song",$this->properties);
		 }
	}
?>