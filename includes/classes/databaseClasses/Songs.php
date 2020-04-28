<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\song as song;

	class Songs extends Crud {
		
		 private $properties = [
			"id"       => "NOT NULL",
            "idUser"   => "NOT NULL",
            "idAlbum"  => "NOT NULL",
			"title"    => "NOT NULL",
			"played"   => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("songs",$this->properties);
		 }
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new song($row["id"],$row["idUser"],$row["idAlbum"],$row["title"],$row["played"]);
			}
		   return $array;
		}
	}
?>