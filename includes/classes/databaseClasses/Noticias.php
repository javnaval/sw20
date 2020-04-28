<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;

	class Noticias extends Crud {
		 private $properties = [
			 "id"      => "NOT NULL",
             "idUser"  => "NOT NULL",
			 "title"   => "NOT NULL",
             "texto"   => "NOT NULL",
			 "accepted"=> "NOT NULL"
		 ];

		 public function __construct(){
			 parent::__construct("noticias",$this->properties);
		 }
	}
?>