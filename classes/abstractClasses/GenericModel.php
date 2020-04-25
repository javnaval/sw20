<?php
     require_once "Crud.php";
     require_once dirname(__DIR__) . "/factories/classesFactory.php";
     abstract class GenericModel extends Crud {
        private $propertiesStatic;
        private $properties;
        private $className;

        function __construct($table,$className,$propertiesStatic) {
            parent::__construct($table,$propertiesStatic);
            $this->propertiesStatic = $propertiesStatic;
            $this->properties = $propertiesStatic;
            $this->className = $className;
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
        public function get() {
            
            $arrayPDO = parent::get();
            $array = null;
            foreach($arrayPDO as $row){
                $array[] = classesFactory::getClass($this->className)->getThis($row);
                                        
            }
           return $array;
        }
  
        private function correctProperties($object){
            if(classesFactory::instance($object)){
               $this->properties = $object->toString();
               var_dump($this->properties);
           
            }
            else{
                foreach($this->propertiesStatic as $key => $value){
                    if(strcmp($key, "NOT NULL") === 0){
                        $valueP = array_search($key,$object);
                        if(strcmp($valueP, "NOT NULL") === 0){
                           return false;
                        }
                        $this->properties[$key] = $valueP;
                    }
                }

            }
         return true;
        }
    }
?>