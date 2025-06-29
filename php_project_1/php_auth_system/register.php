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
            $password = mysqli_real_escape_string( $connection,trim($_POST["password"]));
            $confirm_password = mysqli_real_escape_string( $connection,trim($_POST["confirm_password"]));
       
            //if password does not match
            if($password !== $confirm_password) {
                // 
                $error = "password do not match";

            }else {

                // check if users already exist 
                $query_check_user_exist = "SELECT * FROM users where email='$email' LIMIT 1";
                $execute_query_check_user = mysqli_query($connection,$query_check_user_exist);

                if (!$execute_query_check_user) {
                 die("Query failed: " . mysqli_error($connection));
                }           
                // convert resulktinto array

                $results_array = mysqli_fetch_assoc($execute_query_check_user);
                
                 
                 if(mysqli_num_rows($execute_query_check_user) === 1) {

                    // we assume the user doesnt exist 

                     $error = " user with email $email already exist! ";


                }else {

                    $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
                    $result = mysqli_query($connection,$query);
                //
                      if($result) {
                        echo "user account was created";

                    // reset those fileds to empty 
                    
                     header("location: login.php");

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

<body class="register">
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>

            <!-- When the user is logged in -->
            <li>
                <a href="admin.php">Admin</a>
            </li>
            <li>
                <a href="logout.html">Logout</a>
            </li>

            <!-- When the user is not logged in -->
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="form-container">
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
                <input placeholder="Enter your username" type="text" name="username" required>

                <label for="email">Email:</label>
                <input placeholder="Enter your email" type="email" name="email" required>

                <label for="password">Password:</label>
                <input placeholder="Enter your password" type="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input placeholder="Confirm your password" type="password" name="confirm_password" required>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>

</body>

</html>