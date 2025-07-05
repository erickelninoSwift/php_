<?php 
include "./partials/functions.php";
session_start();
//set to display all errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); 
//
//
  $connection = mysqli_connect("localhost", "root", "root", "login_app");
      if($connection) {
   // connected
       //
     
       return;
   } else {
       echo "". mysqli_connect_error();
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