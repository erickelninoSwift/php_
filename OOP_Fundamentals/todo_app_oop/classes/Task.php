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
        $results = mysqli_query($this->connection, $query);
        //
        return $results;
    }

    public function complete_task ($id) {
      $completed_value = 1;
       $query = "UPDATE " . $this->table . " SET is_completed = ? WHERE id = ?";
       $stmt = mysqli_prepare($this->connection,query: $query);
       $stmt->bind_param("ii", $completed_value, $id);
       $stmt->execute();
       
        return $stmt->affected_rows > 0; // Return true if the task was updated
       
    }
    public function undo_complete_task ($id) {
        $completed_value = 0;
        $query = "UPDATE " . $this->table . " SET is_completed = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->connection,query: $query);
        $stmt->bind_param("ii", $completed_value, $id);
        $stmt->execute();
        
        return $stmt->affected_rows > 0; // Return true if the task was updated
    }
    
    

}