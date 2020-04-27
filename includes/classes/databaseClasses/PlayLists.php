<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\GenericModel as GenericModel;

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