<?php


	class artist  {
		public static $className = "artist";

		
		 private $id;
		 private $name;
		 private $genre;

		 public function __construct($id = null,$name = null,$genre= null){
            $this->id = $id;
            if($id == null){
               $this->$id = uniqid();
            }
            $this->name = $name;
            $this->genre = $genre;
		 }

		 public function getId(){
			 return $this->id;
		 }

		 public function getName(){
			 return $this->name;
		 }

		 public function getImage(){
			 return $this->image;
		 }

        public function getGenre(){
            return $this->genre;
		}
		
		public function getThis($row = null,$id = null,$name = null,$genre= null){
			if($row != null){
				return new self($row["id"],$row["name"],$row["genre"]);
			}
			return new self($id,$name,$genre);
		}
		public function toString(){
			return[
			   "id"    => "".$this->id."",
			   "name"  => "".$this->name."",
			   "genre" => "".$this->genre.""
			];
		}
	}
?>