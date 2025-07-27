<?php include "./partials/header.php"; ?>
<?php include "./partials/notifications.php"; ?>
<?php include "./config/Database.php"; 
  
  $database = new Database();

  $db_connection = $database->getConnection();

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_task'])) {
     echo 'add task';
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['complete_task'])) {
     echo 'complete task';
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['undo_complete_task'])) {
     echo 'undo task';
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_task'])) {
     echo 'delete task';
  }
   
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