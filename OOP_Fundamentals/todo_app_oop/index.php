<?php include "./partials/header.php"; ?>
<?php include "./partials/notifications.php"; ?>
<?php include "./config/Database.php"; 
      include "./classes/Task.php";
  
  $database = new Database();

  $db_connection = $database->getConnection();
  $new_user_task = new Task($db_connection);

  $all_tasks = [];
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //
  

     if(isset($_POST['add_task']) && isset($_POST['task'])){
        $current_task = trim($_POST['task']);
        $new_user_task->task_name = $current_task;
        $resutl = $new_user_task->create_task();
        if($resutl === 1) {
            header("location: http://localhost:8888/php_basics/OOP_Fundamentals/todo_app_oop/index.php");
            $_POST['task'] = '';
            unset($_POST['add_task']);
        }
     }
     //
     if(isset($_POST['complete_task'])){
        
     }
     //
     if(isset($_POST['undo_complete_task'])){
        
     }
     //
     if(isset($_POST['delete_task'])){
        
     }
     //
  }

  // fetch all tasks
  $new_user_task->read_task();

?>


<!-- Add Task Form -->
<form method="POST">
    <input type="text" name="task" placeholder="Enter a new task" required>
    <button type="submit" name="add_task">Add Task</button>
</form>

<!-- Display Tasks -->
<ul>
    <li class="completed">
        <span class="completed">Sample Task</span>
        <div>
            <!-- Complete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="complete" type="submit" name="complete_task">Complete</button>
            </form>

            <!-- Undo Completed Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="undo" type="submit" name="undo_complete_task">Undo</button>
            </form>

            <!-- Delete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="delete" type="submit" name="delete_task">Delete</button>
            </form>
        </div>
    </li>

    <li>
        <span>Another Task</span>
        <div>
            <!-- Complete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="2">
                <button class="complete" type="submit" name="complete_task">Complete</button>
            </form>

            <!-- Delete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="2">
                <button class="delete" type="submit" name="delete_task">Delete</button>
            </form>
        </div>
    </li>
</ul>
<?php include "./partials/footer.php" ?>