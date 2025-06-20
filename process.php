<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = "";
    $password = "";
    $email = "";
    $emailError = "";
    $usernameError = "";
    $passwordError = "";

    if(empty($_POST["username"])) {
       $usernameError = "Username is Required";
    }else {
         $username = htmlspecialchars(trim($_POST["username"]));
    }

    if(empty($_POST["email"])) {
        echo "please make sure email is set";
    }else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailError = "Invalid Email Format";
        };
    }
    // password 
      if(empty($_POST["password"])) {
        $passwordError = "Please provide password";
      }else {
        $password = htmlspecialchars(trim($_POST["password"]));
      }

      // display errors
   echo $usernameError;
    echo $emailError;
    echo $passwordError;

}else {

    echo "GET METHOD";
}