<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\GenericModel as GenericModel;

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