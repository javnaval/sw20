<?php
     require_once("classes/databaseClasses/Albums.php");
     require_once("classes/databaseClasses/Artists.php");
     require_once("classes/databaseClasses/PlayLists.php");
     require_once("classes/databaseClasses/Songs.php");
     require_once("classes/databaseClasses/Users.php");

     class databaseFactory {
         private static $tables = null;
		 private function __construct(){
         }
         
         public static function getTable($nameTable){
             if(databaseFactory::$tables == null){
                 databaseFactory::$tables[] = new Albums();
                 databaseFactory::$tables[] = new Artists();
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