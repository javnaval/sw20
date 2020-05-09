<?php
namespace es\ucm\fdi\aw\classes\classes;
use es\ucm\fdi\aw\classes\databaseClasses\Users as Users;

	class user {

		public static $className = "user";

		
		 private $id;
		 private $user;
		 private $name;
		 private $email;
         private $password;
         private $rol;
         private $solicitado;
         private $descripcion;


		 public function __construct($id,$user,$name,$email,$password,$rol,$solicitado,$descripcion){
             $this->id = $id;
             $this->user = $user;
             $this->name = $name;
             $this->email = $email;
             $this->password = $password;
             $this->rol = $rol;
             $this->solicitado = $solicitado;
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

        public function setRol($rol)
        {
            $this->rol = $rol;
        }

         public function getDescripcion() {
             return $this->descripcion;
         }

         public function getSolicitado() {
		     return $this->solicitado;
         }

		 public function toString(){
			 return[
              "user"         => "".$this->user."",
              "name"         => "".$this->name."",
			  "email"        => "".$this->email."",
			  "password"     => "".$this->password."",
              "rol"          => "".$this->rol."",
              "solicitado"   => "".$this->solicitado."",
              "descripcion"  => "".$this->descripcion.""
			 ];
	     }

        public static function buscaUsuario($user){
		     $user =(new Users())->where("user", "=", $user)->get();
		     return $user[0];
        }

        public static function buscaUsuarioId($id){
		     $user = (new Users())->where("id", "=", $id)->get();
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
            return (new Users())->insert((new self(null,$user, "VACIO", $email, password_hash($contrasenia, PASSWORD_DEFAULT), "usuario", null))->toString());
        }

        public static function buscar($user){
            return (new Users())->where("name", "LIKE", "%".$user."%")->get();
        }

        public static function usersVerificar(){
            return (new Users())->where("rol", "=", "usuario")->orWhere("rol", "=", "premium")->get();
        }
		
		public static function esArtista($id){
			$rol = self::buscaUsuarioId($id)->getRol();
            return ($rol == "artista" || self::esGestor($id));
        }
		
		public static function esGestor($id){
			$rol = self::buscaUsuarioId($id)->getRol();
            return ($rol == "gestor" || self::esAdmin($id));
        }

		public static function esAdmin($id){
			$rol = self::buscaUsuarioId($id)->getRol();
            return ($rol == "administrador");
        }

        public function update(){
            (new Users())->where("id","=",$this->id)->update($this->toString());
        }

        public function actualiza($usuario, $email, $name, $descripcion){
		     $this->user = $usuario;
		     $this->email = $email;
		     $this->name = $name;
		     $this->descripcion = $descripcion;
		     $this->update();
        }

        public function seguir($idSeguir){
            $this->user = $usuario;
            $this->email = $email;
            $this->name = $name;
            $this->descripcion = $descripcion;
            $this->update();
        }
	}
?>