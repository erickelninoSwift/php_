<?php 
    include "database.php";
   
    // this will check wheter the user is alredy logged on 
    if(isset($_SESSION["user_logged_in"]) && $_SESSION['logged_in'] === true ){
       // if the user is logged then redicrect to admin pahe 
       header('location: admin.php');
       exit;    
    }

    $error = "";
    $user_exists = (bool) false;
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        // login 
      if(isset($_POST["username"]) && isset($_POST["password"])) {
          $username = mysqli_real_escape_string($connection,trim($_POST["username"]));
          $password = $_POST["password"];
          $login_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";

          $query_results = mysqli_query($connection,$login_query);
        
        //   $query_array = mysqli_fetch_assoc($query_results);
          if(mysqli_num_rows($query_results) !== 0) {

             // fetch user assoc array
             $user = mysqli_fetch_assoc($query_results);

             //
             if(password_verify($password,$user['password'])) {
        
                $_SESSION['user_logged_in'] = true;
                $_SESSION['username'] = $username;
                // when user was logged redicrect to admin page
                 header('location: admin.php');
                 exit;

                //
             }else {
                $error = "Password does not match !";
                exit;
             }

            //  header("location: admin.php");
          }else {
            $error = "user does not exist";
          }

      }else {
          $error = "Please make sure all fields are filled";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php include "./partials/header.php"; ?>
<?php include "partials/navigation.php" ?>

<!-- Include Header and Navigation -->

<div class="container">
    <div class="form-container">
        <form method="POST" action="">
            <h2>Login</h2>

            <!-- Error message placeholder -->
            <?php if(!empty($error)) : ?>
            <p style="color:red">
                <?php echo $error; ?>
            </p>
            <?php endif; ?>
            <label for="username">Username:</label><br>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</div>


<?php mysqli_close($connection); ?>