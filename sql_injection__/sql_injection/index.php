<?php

    $connect = mysqli_connect("localhost","root","root","sql_injection");
    if(!$connect) {
        die("Database failed to connect". mysqli_connect_error());
    }else {
        echo "connected";
    }
    
?>;