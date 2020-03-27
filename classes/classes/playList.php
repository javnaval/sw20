<?php
require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";

	class playList extends GenericModel {
		 private $id;
		 private $title;
         private $numberSongs;
         private $dateCreated;
		 public function __construct($id = null,$title,$numberSongs,$dateCreated){
            $this->id = $id;
            if($id == null){
               $this->$id = uniqid();
            }
            $this->title = $title;
            $this->numberSongs = $numberSongs;
            $this->dateCreated = $dateCreated;
		 }
		 public function getId(){
			 return $this->id;
		 }
		 public function getTitle(){
			 return $this->title;
		 }
		 public function getNumberSongs(){
			 return $this->numberSongs;
         }
         public function getDateCreated(){
            return $this->dateCreated;
         }
	}
?>