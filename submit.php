<?php 
session_start();

$username = htmlspecialchars(trim($_GET['username']));
$password = htmlspecialchars(trim($_GET['password']));


if($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get method for login in 

    if(!empty($username) && !empty($password)){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    //

    print_r($_SESSION);

    echo "username : {$username} and password : {$password}";
  }else {
      echo "Make sure that all fields are filled";
  }
}

// Validation php