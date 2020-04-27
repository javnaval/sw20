<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\GenericModel as GenericModel;

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