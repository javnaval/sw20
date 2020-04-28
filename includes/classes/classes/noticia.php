<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\factories\classesFactory as classesFactory;
use es\ucm\fdi\aw\classes\classes\user as user;

	class noticia  {
		public static $className = "noticia";

		
		 private $id;
		 private $idUser;
		 private $title;
		 private $text;
		 private $accepted;

		 public function __construct($id = null,$idUser = null,$title= null,$text = null, $accepted = null){
            $this->id = $id;
            if($id == null){
               $this->$id = uniqid();
            }
            $this->idUser = $idUser;
            $this->title = $title;
            $this->text = $text;
			$this->accepted = $accepted;
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

        public function getTexto(){
            return $this->text;
		}
		
		public function getAccepted(){
            return $this->accepted;
		}
		
		public function getThis($row = null,$id = null,$idUser = null,$title = null,$text= null,$accepted = null){
			if($row != null){
				return new self($row["id"],$row["idUser"],$row["title"],$row['texto'], $row["accepted"]);
			}
			return new self($id,$idUser,$title,$text);
		}
		public function toString(){
			return[
			   "id"    => "".$this->id."",
			   "idUser"  => "".$this->idUser."",
			   "title" => "".$this->title."",
                "text" => "".$this->text."",
				"accepted" => "".$this->accepted.""
			];
		}
		
		public static function buscar(){
			if($SESSION['roles']== "Gestor" || $SESSION['roles']== "Administrador")
			{
				$aceptado = 0;
				
			}else $aceptado = 1;
			
			return databaseFactory::getTable("noticias")->where("accepted", "=", "%".$aceptado."%")->get();
        }
		
		public static function crea($title, $idUser, $text){
			
            return databaseFactory::getTable("noticias")->insert(classesFactory::getClass("noticia")->getThis(null, $idUser, $title, $text, 0));
        }
	}
?>