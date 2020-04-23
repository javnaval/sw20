<?php


	class noticia  {
		public static $className = "noticia";

		
		 private $id;
		 private $idUser;
		 private $title;
		 private $text;

		 public function __construct($id = null,$idUser = null,$title= null,$text = null){
            $this->id = $id;
            if($id == null){
               $this->$id = uniqid();
            }
            $this->idUser = $idUser;
            $this->title = $title;
            $this->text = $text;
		 }

		 public function getId(){
			 return $this->id;
		 }

		 public function getIdUser(){
			 return $this->idUser;
		 }

		 public function getTitle(){
			 return $this->title;
		 }

        public function getText(){
            return $this->text;
		}
		
		public function getThis($row = null,$id = null,$idUser = null,$title = null,$text= null){
			if($row != null){
				return new self($row["id"],$row["idUser"],$row["title"],$row['text']);
			}
			return new self($id,$idUser,$title,$text);
		}
		public function toString(){
			return[
			   "id"    => "".$this->id."",
			   "idUser"  => "".$this->idUser."",
			   "title" => "".$this->title."",
                "text" => "".$this->text.""
			];
		}
	}
?>