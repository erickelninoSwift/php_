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
   }else{
      echo "connected successfully";
   }
   
     // check if query is true

    function check_query($query) {
      global $connection;
      if(!$query) {
         return "Error : " . mysqli_error($connection);
      }
      return true;
    }
?>;