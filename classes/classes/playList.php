<?php

	class playList  {
		public static $className = "playList";

		
		 private $id;
		 private $title;
         private $numberSongs;
		 private $dateCreated;
		 
		 public function __construct($id = null, $title= null,$numberSongs = null,$dateCreated = null){
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
		 
		 public function getThis($row = null,$id = null, $title= null,$numberSongs = null,$dateCreated = null){
			if($row != null){
				return new self($row["id"],$row["title"],$row["numberSongs"],$row["dateCreated"]);
			}
			return new self($id,$title,$numberSongs,$dateCreated);
	 	 }
		 public function toString(){
			return[
			   "id"           => "".$this->id."",
			   "title"        => "".$this->title."",
			   "numberSongs"  => "".$this->numberSongs."",
			   "dateCreated"  => "".$this->dateCreated.""
			];
		 } 
	}
?>