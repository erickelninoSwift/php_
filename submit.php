<?php 
session_start();

$username = $_GET['username'] ??'';
$password = $_GET['password'] ??'';

if(!empty($username) && !empty($password)){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
}

print_r($_SESSION);

echo "username : {$username} and password : {$password}";