<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\factories\databaseFactory as databaseFactory;
use es\ucm\fdi\aw\classes\factories\classesFactory as classesFactory;

	class user {

		public static $className = "user";

		
		 private $id;
		 private $user;
		 private $name;
		 private $email;
         private $password;
         private $rol;
         private $descripcion;


		 public function __construct($id = null,$user = null,$name = null,$email = null,$password = null,$rol = null,$descripcion = null){
             $this->id = $id;
             if($id == null){
               $this->$id = uniqid();
             }
             $this->user = $user;
             $this->name = $name;
             $this->email = $email;
             $this->password = $password;
             $this->rol = $rol;
             $this->descripcion = $descripcion;
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

		 public function getEmail(){
			 return $this->email;
		 }

		 public function getPassword(){
			 return $this->password;
		 }

        public function getRol() {
            return $this->rol;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

         public function getThis($row = null,$id = null,$user = null,$name = null,$email = null,$password = null,$rol = null,$descripcion = null){
			if($row != null){
			   return new self($row["id"],$row["user"],$row["name"],$row["email"],$row["password"],$row["rol"],$row["descripcion"]);
			}
			return new self($id,$user,$name,$email,$password,$rol,$descripcion);
		 }
		 public function toString(){
			 return[
              "id"           => "".$this->id."",
              "user"         => "".$this->user."",
              "name"         => "".$this->name."",
			  "email"        => "".$this->email."",
			  "password"     => "".$this->password."",
              "rol"          => "".$this->rol."",
              "descripcion"  => "".$this->descripcion.""
			 ];
	     }

        public static function buscaUsuario($user){
		     $user = databaseFactory::getTable("users")->where("user", "=", $user)->get();
		     return $user[0];
        }

        public static function buscaUsuarioId($id){
		     $user = databaseFactory::getTable("users")->where("id", "=", $id)->get();
		     return $user[0];
        }

        public function compruebaPassword($password){
            return password_verify($password, $this->password);
        }

        public static function login($user, $password){
            $user = self::buscaUsuario($user);
            if ($user != null && $user->compruebaPassword($password)) return $user;
            else return false;
        }

        public static function crea($user, $email, $contrasenia){
            return databaseFactory::getTable("users")->insert(classesFactory::getClass("user")->getThis(null,null,$user, "VACIO", $email, password_hash($contrasenia, PASSWORD_DEFAULT), "usuario", null));
        }

        public static function buscar($user){
            return databaseFactory::getTable("users")->where("name", "LIKE", "%".$user."%")->get();
        }
		
		public static function esGestor($id){
			$rol = self::buscaUsuarioId($id)-> getRol();
            if ($rol == "Gestor" || $rol == "Administrador")
			{
				return true;
			}else return false;
        }
	}
?>