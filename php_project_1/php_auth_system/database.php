<?php 
include "./partials/functions.php";
session_start();
//set to display all errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); 
//
//
$host = "localhost";
$username = "root";
$password = "root";
$database = "login_app";

  $connection = mysqli_connect($host, $username, $password, $database);
   if(!$connection){
    die("Connection failed". mysqli_connect_error());
   }
   
     // check if query is true

    function check_query($query) {
      global $connection;
      if(!$query) {
         return "Error : " . mysqli_error($connection);
      }
      return true;
    }


    // function to regsister users
    function register_user($conn,$username,$email,$password) {
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
         $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$passwordHash')";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    //delete user

    function delete_user_selected($conn, $user_id){
         $sql_delete_user_query = "DELETE FROM users WHERE id='$user_id'";
        return mysqli_query($conn,$sql_delete_user_query);
     }

     // fucntion to update data
     function update_user_selected($conn, $user_id, $username, $email) {
        $sql_query = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";
        $result = mysqli_query($conn,$sql_query);
        return $result;
     }
?>;