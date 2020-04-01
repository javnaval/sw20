<?php
     require_once("classes/classes/album.php");
     require_once("classes/classes/artist.php");
     require_once("classes/classes/playList.php");
     require_once("classes/classes/song.php");
     require_once("classes/classes/user.php");

     class classesFatory {
         private static $classes = null;
		 private function __construct(){
         }
         
         public static function getClass($nameClass){
             if(classesFatory::$classes == null){
                 classesFatory::$classes[] = new album();
                 classesFatory::$classes[] = new artist();
                 classesFatory::$classes[] = new playList();
                 classesFatory::$classes[] = new song();
                 classesFatory::$classes[] = new user();
             }
             foreach(classesFatory::$classes as $class){
                 if(strcmp($nameClass, $class::$className) === 0){
                     return $class;
                 }
             }
             return null;
         }

         public static function instance($instaceClass){
            if(classesFatory::$classes == null){
                classesFatory::$classes[] = new album();
                classesFatory::$classes[] = new artist();
                classesFatory::$classes[] = new playList();
                classesFatory::$classes[] = new song();
                classesFatory::$classes[] = new user();
            }
            foreach(classesFatory::$classes as $class){
                if(($instaceClass instanceof $class)){
                    return true;
                }
            }
            return false;
         }
	}
?>