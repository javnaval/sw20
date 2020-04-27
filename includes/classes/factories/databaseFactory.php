<?php
    namespace es\ucm\fdi\aw\classes\factories;
use es\ucm\fdi\aw\classes\classes\contiene as contiene;
use es\ucm\fdi\aw\classes\classes\noticia as noticia;
use es\ucm\fdi\aw\classes\classes\album as album;
use es\ucm\fdi\aw\classes\classes\playList as playList;
use es\ucm\fdi\aw\classes\classes\song as song;
use es\ucm\fdi\aw\classes\classes\user as user;

     class databaseFactory {
         private static $tables = null;
		 private function __construct(){
         }
         
         public static function getTable($nameTable){
             if(databaseFactory::$tables == null){
                 databaseFactory::$tables[] = new Albums();
                 databaseFactory::$tables[] = new Noticias();
                 databaseFactory::$tables[] = new Contenidos();
                 databaseFactory::$tables[] = new PlayLists();
                 databaseFactory::$tables[] = new Songs();
                 databaseFactory::$tables[] = new Users();
             }
             foreach(databaseFactory::$tables as $table){
                 if(strcmp($nameTable, $table::$tableName) === 0){
                     return $table;
                 }
             }
             return null;
         }
	}
?>