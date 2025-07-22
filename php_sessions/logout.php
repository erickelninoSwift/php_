<?php
    // logout
    session_start();

    //or another trick just to logout .. empty the session
    $_SESSION = [];
    session_destroy();

    header("location: login.php");
    exit();
 