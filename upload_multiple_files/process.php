<?php 
  // echo hello 

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //
    //
    $upload_dir = "upload/";
    
    echo "<pre>";
      var_dump($_FILES);
    echo "</pre>";

    // if the directory doesnt not exist then create one
    if(!is_dir($upload_dir) === true) {
           mkdir($upload_dir,0777, true);
    }
    
    // loop through all the files uploaded 
    foreach($_FILES['files']['name'] as $key => $value) {
       
         echo "<pre>";
        var_dump($value);
         echo "</pre>";
    }

    
  }