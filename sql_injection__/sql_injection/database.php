<?php 
    $connection_db = mysqli_connect("localhost","root","root","prepare_stmt_db");
    if (!$connection_db) {
        die("". mysqli_connect_error());
    }else {
        echo "Connected";
    }
?>;