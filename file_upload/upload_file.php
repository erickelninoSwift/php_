<?php 

// file 

// $file = $_FILES;
// print_r($_POST);
// echo "<br>";
// var_dump($_POST);
// echo "<br>";
echo "<pre>";
print_r($_FILES['upload_file_field']);
echo "</pre>";
echo "<br>";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //

    if($_FILES['upload_file_field']['error'] === 0) {
        echo "ok";
    }
}