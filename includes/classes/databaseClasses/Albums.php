<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\GenericModel as GenericModel;

	 class Albums extends GenericModel {
		public static  $tableName = "albums";
		
		 private $properties = [
			"id"    => "NOT NULL",
             "idArtist" => "NOT NULL",
             "title" => "NOT NULL",
			"releaseDate"  => "NOT NULL"
		];
		 public function __construct(){
			 parent::__construct("albums","album",$this->properties);
		 }
	}
?>