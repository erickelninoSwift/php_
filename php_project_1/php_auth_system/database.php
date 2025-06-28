<?php 
  $connection = mysqli_connect("localhost", "root", "root", "login_app");
      if($connection) {
   // connected
       //
       return;
   } else {
       echo "". mysqli_connect_error();
   }

   die;