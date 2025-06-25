<?php
//start the session

  session_start();
  $error = "";

   if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // let me echo out the post 
    $user_admin = "admin";
    $user_password = "#12345";

    // check if the username is set 

     $user_name = $_POST['username'];
     $password = $_POST['password'];

     if($user_admin === $user_name && $user_password === $password) {

        $_SESSION['user_logged_in'] = (bool)true;
        $_SESSION['username'] = (string) "Eriik Elnino";
        
        header("location: admin.php");
        exit;
     }else {
        $error = " wrong credentials were provided";
     }
     
     
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
</head>

<body>
    <form action="login.php" method="POST">
        <br>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" />
        <br>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="Password" />
        <br>
        <?php if(!empty($error)) { echo "<br>" . $error; } ?>
        <br>
        <input type="submit" value="Submit" />
    </form>
</body>

</html>