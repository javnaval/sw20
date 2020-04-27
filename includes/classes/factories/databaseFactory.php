<?php
namespace es\ucm\fdi\aw\classes\factories;
use es\ucm\fdi\aw\classes\databaseClasses\Albums as Albums;
use es\ucm\fdi\aw\classes\databaseClasses\Noticias as Noticias;
use es\ucm\fdi\aw\classes\databaseClasses\Contenidos as Contenidos;
use es\ucm\fdi\aw\classes\databaseClasses\PlayLists as PlayLists;
use es\ucm\fdi\aw\classes\databaseClasses\Songs as Songs;
use es\ucm\fdi\aw\classes\databaseClasses\Users as Users;

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