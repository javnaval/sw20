<?php
  require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	 class PlayLists extends GenericModel {
		public static  $tableName = "playLists";
		
		 private $properties = [
			 "id"    => "NOT NULL",
             "idUser" => "NOT NULL",
			 "title"  => "NOT NULL",
		 ];
		 public function __construct(){
			 parent::__construct("playLists","playlist",$this->properties);
		 }
	}
?>