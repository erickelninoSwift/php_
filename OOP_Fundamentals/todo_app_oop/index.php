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
  $my_tasks = $new_user_task->read_task();
  $results_fetched = $my_tasks->fetch_all();
?>


<!-- Add Task Form -->
<form method="POST" style="margin-top:100px">
    <input type="text" name="task" placeholder="Enter a new task" required>
    <button type="submit" name="add_task">Add Task</button>
</form>

<!-- Display Tasks -->
<ul>

    <?php foreach($results_fetched as $task): ?>
    <li class="completed">

        <span class="<?php echo (int) $task[2] === 1 ? 'completed' : ''?>"><?php echo $task[1];?></span>
        <div>
            <!-- Complete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="complete" type="submit" name="complete_task">Complete</button>
            </form>
            <!-- Undo Completed Task -->
            <?php if((int)$task[2] === 1): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="undo" type="submit" name="undo_complete_task">Undo</button>
            </form>
            <?php endif; ?>

            <!-- Delete Task -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="1">
                <button class="delete" type="submit" name="delete_task">Delete</button>
            </form>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php include "./partials/footer.php" ?>