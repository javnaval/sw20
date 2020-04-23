<?php
 require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class Artists extends GenericModel {
		public static  $tableName = "artists";
		
		 private $properties = [
			"id"    => "NOT NULL",
			"name"  => "NOT NULL",
             "genre" => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("artists","artist",$this->properties);
		 }
	}
?>