<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Noticias as Noticias;
use es\ucm\fdi\aw\classes\classes\user as user;

	class noticia  {
		public static $className = "noticia";

		
		 private $id;
		 private $idUser;
		 private $title;
		 private $text;
		 private $accepted;

		 public function __construct($id,$idUser,$title,$text, $accepted){
            $this->id = $id;
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

		public function toString(){
			return[
			   "id"    => "".$this->id."",
			   "idUser"  => "".$this->idUser."",
			   "title" => "".$this->title."",
                "text" => "".$this->text."",
				"accepted" => "".$this->accepted.""
			];
		}
		
		public static function buscar($user){
			if(user::esGestor($user))
			{
				$aceptado = 0;
				
			}else $aceptado = 1;
			
			return (new Noticias())->where("accepted", "LIKE", "%".$aceptado."%")->get();
        }
		
		public static function crea($title, $idUser, $text){
			
            return (new Noticias())->insert(classesFactory::getClass("noticia")->getThis(null, $idUser, $title, $text, 0));
        }
	}
?>