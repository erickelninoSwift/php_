<?php  session_start();
   
   $webdite_name = "Modern Todo App";
   $stylesheet_path = "./assets/css/styles.css";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $webdite_name; ?></title>
    <link rel="stylesheet" href=<?php echo $stylesheet_path; ?>>
</head>

<body>


    <!-- Main Content Container -->
    <div class="container">
        <h1>Todo App</h1>