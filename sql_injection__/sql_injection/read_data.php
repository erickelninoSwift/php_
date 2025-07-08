<?php 
   include "./database.php";

   if($_SERVER['REQUEST_METHOD'] === 'POST') {
       $stmt = mysqli_prepare($connection_db,'SELECT id, user_name FROM users WHERE id= ?');
       if($stmt) { 
           $id = 1;
           mysqli_stmt_bind_param($stmt,"i", $id);
           mysqli_stmt_execute($stmt);

           $result = mysqli_stmt_get_result($stmt);
           $assoc_data = mysqli_fetch_assoc($result);
           
          print_r($assoc_data['user_name']);
       }
       
   }

?>;

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
</head>

<body>
    <h2>Welcome to Read Data</h2>

</body>
<form method="POST" action="">
    <input type="submit" value="Read Data" />
</form>

</html>