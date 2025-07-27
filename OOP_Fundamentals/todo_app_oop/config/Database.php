<?php
class Database {
    
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_password = 'root';
    private $todo_database = 'todo_app_msqli_oop';   

    public $connection;

     public function getConnection () {
        $this->connection = null;
        try 
        {
           $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_password,$this->todo_database);

           if($this->connection->connect_error) {
              die('Connection failed ' . $this->connection->connect_error);
           }

        }catch(Exception $error) {
        
             echo 'Connectio Error : ' . $error->getMessage();

        }
        return $this->connection;
     }
}