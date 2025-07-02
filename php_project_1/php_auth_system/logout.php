<?php 
include "database.php";
    session_destroy();
    $_SESSION = [];
    header('location: login.php');

    mysqli_close($connection);
?>;