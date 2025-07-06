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
       $username_to_update = mysqli_real_escape_string($connection, $_POST['username']);
       if(!empty($user_email_to_update_id)){

        // user new email 

        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
         // if this field is not empty
        $sql_query = "UPDATE users SET username='$username_to_update', email='$email_address' WHERE id='$user_email_to_update_id'";
        $result = mysqli_query($connection,$sql_query);
        // Fetch Associate Array
         if(check_query($result)) {
            //
            $_SESSION["message"] = "User was updated successfully !";
            $_SESSION["msg_type"] = "success";
            //
            redirect("admin.php");
         }
       }
    }

    if(isset($_POST["delete_user"])) {
        // display the user you want to delete
        if(isset($_POST["user_id"]) && !empty($_POST["user_id"])) {
            $user_id_to_delete = $_POST['user_id'];
            echo $user_id_to_delete;
             $sql_delete_user_query = "DELETE FROM users WHERE id='$user_id_to_delete'";
             $result_ = mysqli_query($connection,$sql_delete_user_query);
             if(check_query($result_)) {
                  $_SESSION["message"] = "User was deleted successfully !";
                  $_SESSION["msg_type"] = "success";
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

    <style>
    .container_box {
        display: flex;
        flex-direction: column;
    }

    .container_box>.success {
        height: 40px;
        width: 300px;
        background-color: lightgreen;
        display: flex;
        align-items: center;
        padding-left: 5px;
        margin-left: 230px;
        margin-bottom: 10px;
    }

    .container_box>.error {
        height: 40px;
        width: 300px;
        background-color: lightcoral;
        display: flex;
        align-items: center;
        padding-left: 5px;
        margin-left: 230px;
        margin-bottom: 10px;
    }
    </style>
</head>

<?php include "partials/navigation.php" ?>
<h1>Manage Users</h1>

<div class="container">
    <div class="container_box">
        <?php if(isset($_SESSION['message']) && isset($_SESSION['msg_type'])) : ?>
        <!--  -->
        <div class="<?php echo $_SESSION['msg_type'] ?>">
            <?php 
               echo $_SESSION['message'];
               unset($_SESSION['message']);
               unset($_SESSION['msg_type']);
            ?>

        </div>
        <!--  -->
        <?php endif;?>
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
                            <input type="text" name="username" value="<?php echo $fetch_users['username']; ?>" required>
                            <input type="email" name="email" value="<?php echo $fetch_users['email']; ?>" required>
                            <button class="edit" type="submit" name="edit_user">Edit</button>
                        </form>
                        <form method="POST" style="display:inline-block;"
                            onsubmit="return confirm('Are you sure you want to delete this user <?php echo $fetch_users['username'];?> ?');">
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
</div>

</html>