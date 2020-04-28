<?php
namespace es\ucm\fdi\aw\classes\databaseClasses;
use es\ucm\fdi\aw\classes\abstractClasses\Crud as Crud;
     
	 class Relations extends Crud {
		 public static  $tableName = "relations";
		 public function __construct($nameTable){
			 parent::__construct($nameTable,null);
		 }
	}
?>