<?php
namespace es\ucm\fdi\aw;

     class Application {
         private static $instancia;
         private $rutaRaizApp;
         private $connection;
         private $settings;
         private $dirInstalacion;

        public static function getSingleton(){
            if (  !self::$instancia instanceof self) {
                self::$instancia = new self;
            }
            return self::$instancia;
        }

        private function __construct()
        {
        }

        /**
         * Evita que se pueda utilizar el operador clone.
         */
        public function __clone()
        {
            throw new \Exception('No tiene sentido el clonado');
        }


        /**
         * Evita que se pueda utilizar serialize().
         */
        public function __sleep()
        {
            throw new \Exception('No tiene sentido el serializar el objeto');
        }

        /**
         * Evita que se pueda utilizar unserialize().
         */
        public function __wakeup()
        {
            throw new \Exception('No tiene sentido el deserializar el objeto');
        }

        public function init($bdDatosConexion, $rutaRaizApp, $dirInstalacion)
        {
            $this->settings = $bdDatosConexion;

            $this->rutaRaizApp = $rutaRaizApp;
            $tamRutaRaizApp = mb_strlen($this->rutaRaizApp);
            if ($tamRutaRaizApp > 0 && $this->rutaRaizApp[$tamRutaRaizApp - 1] !== '/') {
                $this->rutaRaizApp .= '/';
            }

            $this->dirInstalacion = $dirInstalacion;
            $tamDirInstalacion = mb_strlen($this->dirInstalacion);
            if ($tamDirInstalacion > 0 && $this->dirInstalacion[$tamDirInstalacion - 1] !== '/') {
                $this->dirInstalacion .= '/';
            }

            $this->conn = null;
        }


        public function connect(){
             try{
                 if(!$this->connection){
                     $driver = $this->settings["driver"];
                     $host = $this->settings["host"];
                     $database = $this->settings["database"];
                     $username = $this->settings["username"];
                     $password = $this->settings["password"];
                
                     //Creamos la url;
                     $url = "{$driver}:host={$host};"."dbname={$database}";
                     //Se crea  la conexion;
                     $this->connection = new \PDO($url, $username,$password);
                    }
                 return $this->connection;
             }catch(Exception $exc){
                 echo "Error de conexión a la BD:". $exc->getTraceAsString();
                 error_log("Error de conexión a la BD:". $exc->getTraceAsString());
                 exit;
             }
         }


         public function resuelve($path = '')
         {
             $rutaRaizAppLongitudPrefijo = mb_strlen($this->rutaRaizApp);
             if (mb_substr($path, 0, $rutaRaizAppLongitudPrefijo) === $this->rutaRaizApp) {
                 return $path;
             }

             if (mb_strlen($path) > 0 && $path[0] == '/') {
                 $path = mb_substr($path, 1);
             }
             return $this->rutaRaizApp . $path;
         }

         public function doInclude($path = '')
         {
             if (mb_strlen($path) > 0 && $path[0] == '/') {
                 $path = mb_substr($path, 1);
             }
             include($this->dirInstalacion . '/' . $path);
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

         public function tieneRol($rol, $cabeceraError=NULL, $mensajeError=NULL)
         {
             $roles = $_SESSION['roles'] ?? array();
             if (! in_array($rol, $roles)) {
                 if ( !is_null($cabeceraError) && ! is_null($mensajeError) ) {
                     $bloqueContenido=<<<EOF
<h1>$cabeceraError!</h1>
<p>$mensajeError.</p>
EOF;
                     echo $bloqueContenido;
                 }

                 return false;
             }

             return true;
         }

         public function shutdown(){
            $this->connection = null;
         }

         public function getRutaRaizApp(){
             return $this->rutaRaizApp;
         }

     }
?>