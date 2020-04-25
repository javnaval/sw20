<?php
 require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	 class Albums extends GenericModel {
		public static  $tableName = "albums";
		
		 private $properties = [
			"id"    => "NOT NULL",
			"releaseDate"  => "NOT NULL",
			"title" => "NOT NULL",
			"idArtist" => "NOT NULL"
		];
		 public function __construct(){
			 parent::__construct("albums","album",$this->properties);
		 }
	}
?>