<?php
    $connection_db = mysqli_connect("localhost","root","root","prepare_stmt_db");
//      $sql_query = "CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     user_name VARCHAR(50),
//     email VARCHAR(100),
//     password VARCHAR(255) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

    $sql_query = "INSERT INTO users (user_name, email, password) VALUES (?,?,?)";
    $prepare_statement = mysqli_prepare($connection_db,$sql_query);
    if($prepare_statement) {
        $username = (string) "Anthony";
        $email = (string) "anthony@yahoo.com";
        $password = (string) "#12345!";
        //prepaare statement 
       
        // bind params statement
        mysqli_stmt_bind_param($prepare_statement,"sss", $username, $email, $password);
        
        if(mysqli_stmt_execute($prepare_statement)) {
            //
             echo "User Added successfully";

             // always remember to close
             mysqli_stmt_close($prepare_statement);
        }     
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create data + Prepare statement</title>
</head>

<body>
    <h2>Create Data</h2>
</body>

</html>