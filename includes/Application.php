<?php
     class Application {
         private static $instancia;
         private $rutaRaiz;
         private $connection = null;
         private $settings;
         private $inicializada = false;

        public static function getSingleton(){
            if (  !self::$instancia instanceof self) {
                self::$instancia = new self;
            }
            return self::$instancia;
        }

        private function __clone(){

        }

         public function init($settings, $rutaRaiz){
             if (!$this->inicializada) {
                 $this->settings = $settings;
                 $this->inicializada = true;
             }
             $this->rutaRaiz = $rutaRaiz;
         }

        public function connect(){
             try{
                 if($this->inicializada && $this->connection == null){
                     $driver = $this->settings["driver"];
                     $host = $this->settings["host"];
                     $database = $this->settings["database"];
                     $username = $this->settings["username"];
                     $password = $this->settings["password"];
                
                     //Creamos la url;
                     $url = "{$driver}:host={$host};"."dbname={$database}";
                     //Se crea  la conexion;
                     $this->connection = new PDO($url, $username,$password);
                    }
                 return $this->connection;
             }catch(Exception $exc){
                 echo $exc->getTraceAsString();
             }
         }

         public function login($id) {
             $_SESSION['login'] = true;
             $_SESSION['idUser'] = $id;
         }

         public function logout() {
             if (isset($_SESSION)) session_destroy();
             unset($_SESSION);
             session_start();
         }

         public function usuarioLogueado() {
             return ($_SESSION['login'] ?? false) === true;
         }

         public function shutdown(){
            $this->connection = null;
         }

         public function getRutaRaiz(){
             return $this->rutaRaiz;
         }

     }
?>