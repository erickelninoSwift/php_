<?php

    $connect = mysqli_connect("localhost","root","root","sql_injection");
    if(!$connect) {
        die("Database failed to connect". mysqli_connect_error());
    }else {
        echo "connected";
    }
    $username = "john_doe";
    // we need to avoid the sql injection by adding prepare statement
    
    // $sql_query = "SELECT * FROM users WHERE user_name='john_doe'";
    // $result = mysqli_query($connect,$sql_query);
    // different query for prepare statement
      $sql_query = "SELECT * FROm users WHERE user_name= ?";
      // prepare query 
      $stmt = mysqli_prepare($connect,$sql_query);
      // bidn data to the query
      mysqli_stmt_bind_param($stmt,"s", $username);

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
     
?>;

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display array data</title>
</head>

<body>
    <ul>
        <?php while($asso_array = mysqli_fetch_assoc($result)): ?>
        <li><?php echo $asso_array['user_name'];?></li>
        <?php endwhile; ?>
    </ul>
</body>

</html>