<?php
     require_once("classes/classes/album.php");
     require_once("classes/classes/noticia.php");
     require_once("classes/classes/contiene.php");
     require_once("classes/classes/playList.php");
     require_once("classes/classes/song.php");
     require_once("classes/classes/user.php");

     class classesFactory {
         private static $classes = null;
		 private function __construct(){
         }
         
         public static function getClass($nameClass){
             if(classesFactory::$classes == null){
                 classesFactory::$classes[] = new album();
                 classesFactory::$classes[] = new noticia();
                 classesFactory::$classes[] = new contiene();
                 classesFactory::$classes[] = new playList();
                 classesFactory::$classes[] = new song();
                 classesFactory::$classes[] = new user();
             }
             foreach(classesFactory::$classes as $class){
                 if(strcmp($nameClass, $class::$className) === 0){
                     return $class;
                 }
             }
             return null;
         }

         public static function instance($instaceClass){
            if(classesFactory::$classes == null){
                classesFactory::$classes[] = new album();
                classesFactory::$classes[] = new noticia();
                classesFactory::$classes[] = new contiene();
                classesFactory::$classes[] = new playList();
                classesFactory::$classes[] = new song();
                classesFactory::$classes[] = new user();
            }
            foreach(classesFactory::$classes as $class){
                if(($instaceClass instanceof $class)){
                    return true;
                }
            }
            return false;
         }
	}
?>