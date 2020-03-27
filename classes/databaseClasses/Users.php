<?php
	class Users extends GenericModel {
		private $properties = [
			 "id"         => "NOT NULL",
             "user"       => "NOT NULL",
			 "name"       => "NOT NULL",
			 "firstName"  => "NOT NULL",
			 "lastName"   => "NOT NULL",
			 "email"      => "NOT NULL",
			 "password"   => "NOT NULL",
		 ];
		public function __construct(){
			parent::__construct("Users",$this->properties);
		}


		public function get() {
			$usersPDO = parent::get();
			foreach($usersPDO as $row){
				$arrayUsers[] = new user($row['id'],$row['user'],$row['name'],$row['firstName'],
										 $row['lastName'],$row['email'],$row['password']);
										 
			}
			return $arrayUsers;
		 }
	}
?>