<?php

require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class Songs extends GenericModel {
		public static $tableName = "songs";
		
		 private $properties = [
			"id"       => "NOT NULL",
            "idUser" => "NOT NULL",
            "idAlbum" => "NOT NULL",
			"title"    => "NOT NULL",
			"played"    => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("songs","song",$this->properties);
		 }
	}
?>