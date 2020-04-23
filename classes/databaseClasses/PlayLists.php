<?php
  require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	 class PlayLists extends GenericModel {
		public static  $tableName = "playLists";
		
		 private $properties = [
			 "id"    => "NOT NULL",
			 "title"  => "NOT NULL",
			 "numberSongs" => "NOT NULL",
			 "dateCreated" => "NOT NULL",

		 ];
		 public function __construct(){
			 parent::__construct("PlayLists","playlist",$this->properties);
		 }
	}
?>