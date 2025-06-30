<?php 
    include "database.php";

    $error = (string) "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        // login 

        echo "erick elnino";
      if(isset($_POST["username"]) && isset($_POST["password"])) {
          $username = mysqli_real_escape_string($connection,trim($_POST["username"]));
          $password = mysqli_real_escape_string($connection, trim( $_POST["password"]));
          $login_query = "SELECT * FROM users WHERE email = '$username'";

          $query_results = mysqli_query($connection,$login_query);
          // check number of rows

          if(mysqli_num_rows($query_results) === 1) {
          //the user was found 
        echo "everyone put your hands up";
        
          }else{

            $error = "User was not found";
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
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login">


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

    <!-- Include Footer -->

</body>

</html>