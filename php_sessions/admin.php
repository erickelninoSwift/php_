<?php
   session_start();
   $user_name = $_SESSION['username'];
   //
   if(!isset($_SESSION['username']) || !isset($_SESSION['user_logged_in'])){
      header('location: login.php');
      exit();
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <h1>Admin</h1>
    <h2>Welcome , <?php echo $user_name; ?></h2>

    <a href="logout.php">Logout</a>
</body>

</html>