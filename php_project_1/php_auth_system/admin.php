<?php 
    include "database.php";
    // 
    if(!isset($_SESSION['username']) && !isset($_SESSION['user_logged_in'])){
        header('location: login.php');
    }
    // 
    if(isset($_SESSION['username']) && isset($_SESSION['user_logged_in']) === true){
      //
      $fetch_users = "SELECT * FROM users";
      // fetch users from the database
      $fetch_users_query = mysqli_query($connection,$fetch_users);
      $fetch_users_count = mysqli_num_rows($fetch_users_query);
      if($fetch_users_count > 0){
        // convert to assoc array
        $fetch_users = mysqli_fetch_assoc($fetch_users_query);
        echo "<pre>";
        var_dump($fetch_users);
        echo "</pre>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Page</title>
</head>

<body class="admin">

    <?php include "partials/navigation.php" ?>
    <h1>Manage Users</h1>

    <div class="container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>john_doe</td>
                    <td>john@example.com</td>
                    <td>January 1</td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="user_id" value="1">
                            <input type="email" name="email" value="john@example.com" required>
                            <button class="edit" type="submit" name="edit_user">Edit</button>
                        </form>
                        <form method="POST" style="display:inline-block;"
                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <input type="hidden" name="user_id" value="1">
                            <button class="delete" type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>jane_doe</td>
                    <td>jane@example.com</td>
                    <td>February 15</td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="user_id" value="2">
                            <input type="email" name="email" value="jane@example.com" required>
                            <button class="edit" type="submit" name="edit_user">Edit</button>
                        </form>
                        <form method="POST" style="display:inline-block;"
                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <input type="hidden" name="user_id" value="2">
                            <button class="delete" type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
                <!-- Additional user rows can go here -->
            </tbody>
        </table>
    </div>

    <!-- Include Footer -->
</body>

</html>