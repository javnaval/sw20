<?php
namespace es\ucm\fdi\aw\classes\factories;
use es\ucm\fdi\aw\classes\classes\contiene as contiene;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\playList as playList;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\user as user;

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