<?php 
// leran to diplay error

 $fileError = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //
    

    $allowed_files = ["pdf","jpg","jpeg","tiff"];

    if($_FILES['file']['error'] === 0) {
       // get hold of the file
        $file__ = $_FILES['file'];
        $upload_dir =  "upload/";

        $currentFile = basename($file__['name']);

        $target_file = $upload_dir . $currentFile;
        
        $file_size = $file__['size'];
        $file_type = strtolower(pathinfo($currentFile, PATHINFO_EXTENSION));
        $file_size_converted = round(($file_size / 1000) ,2);
       
      
         if($file_size > 2 * 1024 * 1024) {
            //
              $fileError =  "File is very Large : " . $file_size_converted;
             ///
           } elseif(in_array($file_type, $allowed_files)) {

               echo "The file with the right format was uploaded";
            
           }else {
                  $fileError =  "File type is not allowed to be uploaded";
           }


       
        // move

        // if( move_uploaded_file($file__['tmp_name'], $target_file)){
        //     echo "The file : " . $file__['name'] . " has been uploaded";
        // }else {
        //     echo "There was an error while uploading your file ";
        // }
        
    }else {
        echo "There was an error while trying to upload the file";
    }
     echo empty($fileError) ?"":"";
}