<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
use es\ucm\fdi\aw\classes\classes\user as user;

	class Users extends Crud {
		private $properties = [
             "user"        => "NOT NULL",
			 "name"        => "NOT NULL",
			 "email"       => "NOT NULL",
			 "password"    => "NOT NULL",
             "rol"         => "NOT NULL",
             "descripcion" => "NOT NULL"
		 ];
		 public function __construct(){
			parent::__construct("users",$this->properties);
		 }
		 public function get(){
			$arrayPDO = parent::get();
			$array = null;
			foreach($arrayPDO as $row){
				$array[] = new user($row["id"],$row["user"],$row["name"],$row["email"],$row["password"],$row["rol"],$row["descripcion"]);
			}
		   return $array;
		 }
	}
?>