<?php 

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
       echo "connected";
       return;
   } else {
       echo "". mysqli_connect_error();
   }

   die;