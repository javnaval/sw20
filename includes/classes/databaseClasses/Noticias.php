<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

	class Noticias extends Crud {
		 private $properties = [
             "idUser"  => "NOT NULL",
			 "title"   => "NOT NULL",
             "texto"   => "NOT NULL",
			 "accepted"=> "NOT NULL"
		 ];

		 public function __construct(){
			 parent::__construct("noticias",$this->properties);
		 }
		 
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new noticia($row["id"],$row["idUser"],$row["title"],$row["texto"],$row["accepted"]);
			}
		   return $array;
		 }
	}
?>