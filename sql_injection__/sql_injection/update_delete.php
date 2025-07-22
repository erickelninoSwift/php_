<?php 
   include "database.php";

   //prepare statement
   $stmt = mysqli_prepare($connection_db,"UPDATE users SET user_name=? WHERE id=?");
   if($_SERVER['REQUEST_METHOD'] === 'POST') {
     // everything goes here

    if(isset($_POST['read'])){
        //
     $username = "Erik Elnino";
     $user_id = mysqli_real_escape_string($connection_db, $_POST['user_id']);
     mysqli_stmt_bind_param($stmt,'si', $username, $user_id);
     //
     if(mysqli_stmt_execute($stmt)) {
         echo $results ?? '';
     }
    }
    // delete 
    $stmt_2 = mysqli_prepare($connection_db, "DELETE FROM users WHERE id=?");
    // 
    if(isset($_POST['delete']) && isset($stmt_2)){
        
         $user_id = mysqli_real_escape_string($connection_db, $_POST['user_id']);
        //statement to delete data
        if(!empty($user_id)){
            //
              mysqli_stmt_bind_param($stmt_2,'i', $user_id);
              mysqli_stmt_execute($stmt_2);
              header("location: update_delete.php");
        }
    }
    
   } 
   
?>;


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create data + Prepare statement</title>
</head>

<body>
    <h2>UPDATE AND DELETE</h2>
    <form method="POST" action="">

        <input type="text" name="user_id" placeholder="user id" />
        <input type="submit" name="read" value="Read Data" />
        <input type="submit" name="delete" value="Delete Data" />
    </form>
</body>

</html>