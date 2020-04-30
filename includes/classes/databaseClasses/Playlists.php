<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\playlist as playlist;

	 class Playlists extends Crud {
		
		 private $properties = [
             "idUser" => "NOT NULL",
			 "title"  => "NOT NULL",
		 ];
		 public function __construct(){
			 parent::__construct("playlists",$this->properties);
		 }
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new playlist($row["id"],$row["idUser"],$row["title"]);
			}
		   return $array;
		}
	}
?>