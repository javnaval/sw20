<?php

    require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";
	class Users extends GenericModel {

		public static $tableName = "users";

		
		private $properties = [
			 "id"         => "NOT NULL",
             "user"       => "NOT NULL",
			 "name"       => "NOT NULL",
			 "email"      => "NOT NULL",
			 "password"   => "NOT NULL",
             "rol"        => "NOT NULL",
             "descripcion" => "NULL",
		 ];
		public function __construct(){
			parent::__construct("users","user",$this->properties);
		}
	}
?>