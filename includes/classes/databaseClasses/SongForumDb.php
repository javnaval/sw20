<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\songForum as songForum;

	class SongForumDb extends Crud {
		
		 private $properties = [
			"idSong"  => "NOT NULL",
			"idUser"  => "NOT NULL",
			"text"    => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("songForum",$this->properties);
		 }
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new songForum($row["id"],$row["idSong"],$row["idUser"],$row["text"]);
			}
		   return $array;
		}
	}
	
?>