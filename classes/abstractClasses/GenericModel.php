<?php
     require_once "Crud.php";
     abstract class GenericModel extends Crud {
         private $propertiesStatic;
         private $properties;

         function __construct($table, $propertiesStatic) {
             parent::__construct($table);
             $this->propertiesStatic = $propertiesStatic;
             $this->properties = $propertiesStatic;
         }

         public function insert($object) {
             if($this->correctProperties($object)){
                return parent::insert($this->properties);
             }
         }

         public function update($object) {
             if($this->correctProperties($object)){
                 return parent::insert($this->properties);
             }
         }

          private function correctProperties($object){
            foreach($this->propertiesStatic as $key => $value){
                if(strcmp($key, "NOT NULL") === 0){
                     $valueP = array_search($key,$object);
                     if(strcmp($valueP, "NOT NULL") === 0){
                         return false;
                     }
                     $this->properties[$key] = $valueP;
                }
            }
            return true;
          }
    }
?>