<?php
	 class PlayLists extends GenericModel {
		 private $properties = [
			 "id"    => "NOT NULL",
			 "title"  => "NOT NULL",
			 "numberSongs" => "NOT NULL",
			 "dateCreated" => "NOT NULL",

		 ];
		 public function __construct(){
			 parent::__construct("PlayLists",$this->properties);
		 }


		 public function get() {
			 $playListPDO = parent::get();
			 foreach($playListPDO as $row){
				 $arrayPlayList[] = new playList($row['id'],$row['title'],$row['title'],$row['numberSongs'],$row['dateCreated']);
			 }
			 return $arrayPlayList;
		 }
	}
?>