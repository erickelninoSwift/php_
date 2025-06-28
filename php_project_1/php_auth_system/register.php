<?php
    include "database.php";

    $error = "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST["username"]) 
        && isset($_POST["email"]) 
        && isset($_POST["password"]) 
        && isset($_POST["confirm_password"])) {
            // 
            //validations
            $username = mysqli_real_escape_string($connection,trim($_POST["username"]));
            $email = mysqli_real_escape_string( $connection,trim($_POST["email"]));
            $password = mysqli_real_escape_string( $connection,trim($_POST["password"]));
            $confirm_password = mysqli_real_escape_string( $connection,trim($_POST["confirm_password"]));

            
   
        }
     
    }else {
        echo "this is not a post method";
    }
?>;

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
                <p style="color:red">
                    <!-- Error message goes here -->
                </p>

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