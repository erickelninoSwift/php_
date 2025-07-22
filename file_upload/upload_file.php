<?php 

// file 

// $file = $_FILES;
// print_r($_POST);
// echo "<br>";
// var_dump($_POST);
// echo "<br>";
echo "<pre>";
print_r($_FILES['file']);
echo "</pre>";
echo "<br>";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //

    if($_FILES['file']['error'] === 0) {
       // get hold of the file
        $file__ = $_FILES['file'];
        $upload_dir =  "upload/";

        $currentFile = basename($file__['name']);

        $target_file = $upload_dir . $currentFile;

        // move

        if( move_uploaded_file($file__['tmp_name'], $target_file)){
            echo "The file : " . $file__['name'] . " has been uploaded";
        }else {
            echo "There was an error while uploading your file ";
        }
        
    }else {
        echo "There was an error while trying to upload the file";
    }
}