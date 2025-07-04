<?php
    include "database.php";

    $error = "";
    $success = "";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST["username"]) 
        && isset($_POST["email"]) 
        && isset($_POST["password"]) 
        && isset($_POST["confirm_password"])) {
            // 
            //validations
            $error = "";
            $username = mysqli_real_escape_string($connection,trim($_POST["username"]));
            $email = mysqli_real_escape_string( $connection,trim($_POST["email"]));
            $password = trim($_POST["password"]);
            $confirm_password = trim($_POST["confirm_password"]);
       
            //if password does not match
            if($password !== $confirm_password) {
                // 
                $error = "password do not match";
                exit;

            }else {

                // check if users already exist 
                // $query_check_user_exist = "SELECT * FROM users where email='$email' LIMIT 1";
                // $execute_query_check_user = mysqli_query($connection,$query_check_user_exist);

                // if (!$execute_query_check_user) {
                //  die("Query failed: " . mysqli_error($connection));
                // }           
                // convert resulktinto array
                
                 
                 if(check_user_exists($connection,$email)) {

                    // we assume the user doesnt exist 

                     $error = " user with email $email already exist! ";


                }else {

                    $results_array = mysqli_fetch_assoc($execute_query_check_user);
                    //hashing password

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$passwordHash')";
                    $result = mysqli_query($connection,$query);
                //
                     
                      if($result) {
                        echo "user account was created";
                        $_SESSION['logged_in'] = (bool) true;
                        $_SESSION['username'] = $username;


                         header("Location: admin.php"); // Use header() for redirection
                         exit;

                      }else {
                      echo "Something has happened while registering the user" . mysqli_error( $connection );
                   }

                }

                // Query to register the user

              
            }
   
        }else {

            $error = "Please make sure all the fields are completed";
        }
     
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include "./partials/header.php"; ?>
<?php 
       include "./partials/navigation.php";
     
     ?>

<div class="container">
    <div class="form-container">
        <div>
            < </div>
                <form method="POST" action="">
                    <h2>Create your Account</h2>

                    <!-- Error message placeholder -->
                    <?php if(!empty($error)): ?>
                    <p style="color:red">
                        <!-- Error message goes here -->
                        <?php echo $error; ?>
                    </p>
                    <?php endif; ?>

                    <label for="username">Username:</label>
                    <input value="<?php echo isset($username) === true ? $username : '';?>"
                        placeholder="Enter your username" type="text" name="username" required>

                    <label for="email">Email:</label>
                    <input value="<?php echo isset($email) === true ? $email : '';?>" placeholder="Enter your email"
                        type="email" name="email" required>

                    <label for="password">Password:</label>
                    <input placeholder="Enter your password" type="password" name="password" required>

                    <label for="confirm_password">Confirm Password:</label>
                    <input placeholder="Confirm your password" type="password" name="confirm_password" required>

                    <input type="submit" value="Register">
                </form>
        </div>
    </div>

    <?php mysqli_close($connection); ?>