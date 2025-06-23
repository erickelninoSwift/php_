<?php 
  // echo hello 

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //
    //
    $upload_dir = "upload/";
    
    // echo "<pre>";
    //   var_dump($_FILES);
    // echo "</pre>";

    // if the directory doesnt not exist then create one
    if(!is_dir($upload_dir) === true) {
           mkdir($upload_dir,0777, true);
    }
    
    // loop through all the files uploaded 
    print_r($_FILES['files']['name'][1]);
    //
    foreach($_FILES['files']['name'] as $key => $file_name) {
       
        $tmp_name = $_FILES['files']['tmp_name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_error = $_FILES['files']['error'][$key];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target = $upload_dir . basename($file_name);
        // echo $target;

        if($file_error === UPLOAD_ERR_OK) {
            //
            if($file_size > 5 * 1024 * 1024) {
                echo "<br>" . "ERROR: file too big";
                break;
            }
            // check file extentions
            if(!in_array($file_type, ['pdf','jpeg','jpg,png'])) {
                echo "<br>" . "ERROR: file $file_name extension is not valid";
                break; 
            }
            // upload

            if(move_uploaded_file($tmp_name, $target)) {
                echo "DEBUG: $file_name was uploaded successfully";
            }else {
                echo "<br>" . "file $file_name was no uploaded";
            }
            
        }
        //
        //  echo "<pre>";
        //     var_dump( $tmp_name);
        //  echo "</pre>";
    }

    
  }