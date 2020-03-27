<?php
require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";

	class artist extends GenericModel {
		 private $id;
		 private $name;
		 private $genre;

		 public function __construct($id = null,$name,$genre){
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
	}
?>