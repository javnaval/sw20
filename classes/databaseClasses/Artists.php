<?php
	class Artists extends GenericModel {
		 private $properties = [
			"id"    => "NOT NULL",
			"name"  => "NOT NULL",
             "genre" => "NOT NULL"
		 ];
		 public function __construct(){
			 parent::__construct("Artists",$this->properties);
		 }


		 public function get() {
			$artistsPDO = parent::get();
			foreach($artistsPDO as $row){
				$arrayArtists[] = new artist($row['id'],$row['name'],$row['genre']);
			}
			return $arrayArtists;
		}
	}
?>