<?php
 require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class Noticias extends GenericModel {
		public static  $tableName = "noticias";
		
		 private $properties = [
			"id"    => "NOT NULL",
             "idUser"    => "NOT NULL",
			"title"  => "NOT NULL",
             "texto" => "NOT NULL"
		 ];

		 public function __construct(){
			 parent::__construct("noticias","noticia",$this->properties);
		 }
	}
?>