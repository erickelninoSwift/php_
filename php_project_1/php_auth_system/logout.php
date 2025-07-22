<?php 
include "database.php";
    $_SESSION = [];
    // destroy the session
     session_destroy();
    header('location: login.php');

    mysqli_close($connection);
?>;