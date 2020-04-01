<?php
 require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	 class Albums extends GenericModel {
		public static  $tableName = "Albums";
		
		 private $properties = [
			"id"    => "NOT NULL",
			"releaseDate"  => "NOT NULL",
			"title" => "NOT NULL",
			"idArtist" => "NOT NULL"
		];
		 public function __construct(){
			 parent::__construct("Albums","album",$this->properties);
		 }
	}
?>