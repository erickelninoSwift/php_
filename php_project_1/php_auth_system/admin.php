<?php 
    include "database.php";
    // 
    if(!is_user_logged_in()){
        redirect("login.php");
    }
    // 
    if(isset($_SESSION['username']) && isset($_SESSION['user_logged_in']) === true){
      //
      $fetch_users = "SELECT * FROM users";
      // fetch users from the database
      $fetch_users_query = mysqli_query($connection,$fetch_users);
      $fetch_users_count = mysqli_num_rows($fetch_users_query);

    }

    if(isset($_POST['edit_user'])) {
       $user_email_to_update_id = mysqli_real_escape_string($connection, $_POST['user_id']);
       //
       if(!empty($user_email_to_update_id)){

        // user new email 

        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
         // if this field is not empty
        $sql_query = "UPDATE users SET email='$email_address' WHERE id='$user_email_to_update_id'";
        $result = mysqli_query($connection,$sql_query);
        // Fetch Associate Array
         if(check_query($result)) {
            redirect("admin.php");
         }
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include "./partials/header.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Page</title>
</head>

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

            <?php while($fetch_users = mysqli_fetch_assoc($fetch_users_query)): ?>
            <tr>
                <td><?php echo $fetch_users['id']; ?></td>
                <td><?php echo $fetch_users['username']; ?></td>
                <td><?php echo $fetch_users['email']; ?></td>
                <td><?php echo format_data_format($fetch_users['reg_date'])?></td>
                <td>
                    <form method="POST" style="display:inline-block;">
                        <input type="hidden" name="user_id" value="<?php echo $fetch_users['id']; ?>">
                        <input type="email" name="email" value="<?php echo $fetch_users['email']; ?>" required>
                        <button class="edit" type="submit" name="edit_user">Edit</button>
                    </form>
                    <form method="POST" style="display:inline-block;"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="user_id" value="<?php echo $fetch_users['id']; ?>">
                        <button class="delete" type="submit" name="delete_user">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
            <!-- Additional user rows can go here -->
        </tbody>
    </table>
</div>

</html>