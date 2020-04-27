<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\factories\classesFactory as classesFactory;

	class playlist  {
		public static $className = "playList";

		
		 private $id;
		 private $idUser;
		 private $title;
		 
		 public function __construct($id = null, $idUser = null, $title= null){
            $this->id = $id;
            if($id == null){
               $this->$id = uniqid();
            }
            $this->idUser = $idUser;
            $this->title = $title;
		 }
		 public function getId(){
			 return $this->id;
		 }

        public function getIdUser() {
            return $this->idUser;
        }

		 public function getTitle(){
			 return $this->title;
		 }
		 
		 public function getThis($row = null,$id = null, $idUser = null, $title= null){
			if($row != null){
				return new self($row["id"],$row['idUser'],$row["title"]);
			}
			return new self($id,$idUser,$title);
	 	 }
		 public function toString(){
			return[
			   "id"           => "".$this->id."",
               "idUser"           => "".$this->idUser."",
			   "title"        => "".$this->title.""
			];
		 } 
	}
?>