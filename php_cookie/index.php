<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Cookies</title>
</head>
<?php 
      if(isset($_COOKIE['user_token'])) {
        //
          $username = $_COOKIE['user_token'];

          print_r($username);
      }
?>

<body>
    <h2>Cookie PHP</h2>
</body>

</html>