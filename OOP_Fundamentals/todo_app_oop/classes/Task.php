<?php

class Task {

    private $connection;
    private $table = 'todo_app';
    public $task_name;


    public function __construct($db_connection, $task_name) {
        $this->connection = $db_connection;
        $this->task_name = $task_name;
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

}