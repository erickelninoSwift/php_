<?php

class Task {

    private $connection;
    private $table = 'todo_app';
    public $task_name;


    public function __construct($db_connection) {
        $this->connection = $db_connection;
    }

    public function create_task (){
        // write the query to add data to db 
        $query = "INSERT INTO ". $this->table." (task) VALUES (?)";
        $stmt = mysqli_prepare($this->connection,$query);

        if(!$stmt) {
            die('Prepare failed: ' . mysqli_error($this->connection));
        }
        //
        $stmt->bind_param("s" ,$this->task_name);
        $results = $stmt->execute();
       
        return $results;
    }

    public function read_task () {
      
        //
        $query = "SELECT * FROM ". $this->table;
        $stmt = $this->connection->query($query);
        //
        $results = mysqli_fetch_assoc($stmt);
        return $results;
    }

}