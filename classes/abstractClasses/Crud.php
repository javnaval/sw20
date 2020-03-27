<?php
     abstract class Crud {

         private $table;
         private $connection;
         private $wheres = "";
         private $sql = null;

         public function __construct($table = null) {
             $singleton = Application::getSingleton();
             $this->connection = $singleton->connect();
             $this->table = $table;
         }

         public function get() {
             try {
                 $this->sql = "SELECT * FROM {$this->table} {$this->wheres}";
                 $query = $this->connection->prepare($this->sql);
                 $query->execute();
                 $this->resetCRUD();
                 return $query->fetchAll();
             } catch (Exception $exc) {
                 $this->resetCRUD(PDO::FETCH_OBJ);
                 echo $exc->getTraceAsString();
             }
         }


         public function insert($object) {
             try {
                 $arrayKeys = implode(", ", $this->connection->array_keys($object)); //nombre, apellido,edad
                 $arrayValues = ":" . implode(", :", $this->connection->array_keys($object)); //:nombre, :apellido, :edad
                 $this->sql = "INSERT INTO {$this->table} ({$arrayKeys}) VALUES ({$arrayValues})";
                 $this->runCRUD($object);
                 return $this->connection->lastInsertId();
             } catch (Exception $exc) {
                 $this->resetCRUD();
                 throw $exc;
                 echo $exc->getTraceAsString();
             }
         }



         public function update($object) {
              try {
                 $Keys = "";
                 foreach ($object as $key => $valor) {
                     $Keys .= "$key=:$key,"; 
                 }
                 $Keys = rtrim($Keys, ",");
                 $this->sql = "UPDATE {$this->table} SET {$Keys} {$this->wheres}";
                 $this->runCRUD($object);
             } catch (Exception $exc) {
                 $this->resetCRUD();
                 echo $exc->getTraceAsString();
             }
         }

         public function delete() {
             try {
                 $this->sql = "DELETE FROM {$this->table} {$this->wheres}";
                 $this->runCRUD();
             } catch (Exception $exc) {
                 $this->resetCRUD();
                 echo $exc->getTraceAsString();
             }
         }

         public function where($key, $condition, $value) {
             $this->wheres .= (strpos($this->wheres, "WHERE")) ? " AND " : " WHERE ";
             $this->wheres .= "$key $condition " . ((is_string($value)) ? "\"$value\"" : $value) . " ";
             return $this;
         }

         public function orWhere($key, $condition, $value) {
             $this->wheres .= (strpos($this->wheres, "WHERE")) ? " OR " : " WHERE ";
             $this->wheres .= "$key $condition " . ((is_string($value)) ? "\"$value\"" : $value) . " ";
             return $this;
         }

         private function runCRUD($object = null) {
             $query = $this->connection->prepare($this->sql);
             if ($object !== null) { 
                 foreach ($object as $key => $value) {
                     if (empty($value)) {
                         $value = NULL;
                     }
                 $query->bindValue(":$key", $value);
                 }
             }
             $query->execute();
             $this->resetCRUD();
         }

         private function resetCRUD() {
             $this->wheres = "";
             $this->sql = null;
         }
}