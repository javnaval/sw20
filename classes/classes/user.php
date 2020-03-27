<?php
    require_once dirname(__DIR__) . "/abstractClasses/GenericModel.php";

	class user extends GenericModel {
		 private $id;
		 private $user;
		 private $name;
		 private $firstName;
		 private $lastName;
		 private $email;
         private $password;


		 public function __construct($id = null,$user,$name,$firstName,$lastName,$email,$password){
             $this->id = $id;
             if($id == null){
               $this->$id = uniqid();
             }
             $this->user = $user;
             $this->name = $name;
             $this->firstName = $firstName;
             $this->lastName = $lastName;
             $this->email = $email;
             $this->password = $password;
		 }

         public function getId(){
             return $this->id;
         }

         public function getUser(){
             return $this->user;
         }

		 public function getName(){
			 return $this->name;
		 }

		 public function getFirstName(){
			 return $this->firstName;
		 }

		 public function getLastName(){
			 return $this->lastName;
		 }

		 public function getEmail(){
			 return $this->email;
		 }

		 public function getPassword(){
			 return $this->password;
		 }

	}
?>