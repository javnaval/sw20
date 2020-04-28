<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\album as album;

	 class Albums extends Crud {
		
		 private $properties = [
			 "id"           => "NOT NULL",
             "idArtist"     => "NOT NULL",
             "title"        => "NOT NULL",
			 "releaseDate"  => "NOT NULL"
		];
		 public function __construct(){
			 parent::__construct("albums",$this->properties);
		 }
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new album($row["id"],$row["idArtist"],$row["title"],$row["releaseDate"]);
			}
		   return $array;
		}

	}
?>