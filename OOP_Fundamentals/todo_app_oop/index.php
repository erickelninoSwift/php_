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
  

     if(isset($_POST['add_task'])){
        $current_task = trim($_POST['task']);
        $new_user_task->task_name = $current_task;

        if($resutl = $new_user_task->create_task()) {
            $_SESSION['message'] = "Task Created Successfully";
            header("location: http://localhost:8888/php_basics/OOP_Fundamentals/todo_app_oop/index.php");
             unset($_POST['add_task']);
             $_POST['add_task'] = '';
            
        }
     }
     //
     if(isset($_POST['complete_task'])){
        $task_id = trim($_POST['id']);
        if($new_user_task->complete_task($task_id)){
            $_SESSION['message'] = "Task Completed Successfully";
            header("location: http://localhost:8888/php_basics/OOP_Fundamentals/todo_app_oop/index.php");
            unset($_POST['complete_task']);
           $_POST['complete_task'] = '';
        }
     }
     //
     if(isset($_POST['undo_complete_task'])){
        $task_id = trim($_POST['id']);
        //
         if($new_user_task->undo_complete_task($task_id)){
            $_SESSION['message'] = "Task re-activated Successfully";
            header("location: http://localhost:8888/php_basics/OOP_Fundamentals/todo_app_oop/index.php");
            unset($_POST['undo_complete_task']);
            $_POST['undo_complete_task'] = '';
        }
        
     }
     //
     if(isset($_POST['delete_task'])){
        $task_id = trim($_POST['id']);
        $new_user_task->delete_task($task_id);
        $_SESSION['message'] = "Task deleted Successfully!";
        header("location: http://localhost:8888/php_basics/OOP_Fundamentals/todo_app_oop/index.php");
        unset($_POST['delete_task']);
        $_POST['delete_task'] = '';
    
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
            <?php if((int)$task[2] === 0): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $task[0]; ?>">
                <button class="complete" type="submit" name="complete_task">Complete</button>
            </form>
            <?php endif; ?>
            <!-- Undo Completed Task -->
            <?php if((int)$task[2] === 1): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $task[0]; ?>">
                <button class="undo" type="submit" name="undo_complete_task">Undo</button>
            </form>
            <?php endif; ?>

            <!-- Delete Task -->
            <form onsubmit="return confirmDelete()" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $task[0]; ?>">
                <button class="delete" type="submit" name="delete_task">Delete</button>
            </form>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this task?");
}
</script>
<?php include "./partials/footer.php" ?>