<?php 
// leran to diplay error

 $fileError = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //
    

    $allowed_files = ["pdf","jpg","jpeg","tiff"];
    echo "<pre>";
     print_r($_FILES['file'] ?? "") ;
     echo "</pre>";
     
     echo "<br>";

    if(!empty($_FILES['file'])&&$_FILES['file']['error'] === 0) {
       // get hold of the file
        $file__ = $_FILES['file'];
        $upload_dir =  "upload/";

        $currentFile = basename($file__['name']);

        $target_file = $upload_dir . $currentFile;
        
        $file_size = $file__['size'];
        $file_type = strtolower(pathinfo($currentFile, PATHINFO_EXTENSION));
        $file_size_converted = (float) round(($file_size / 1000) ,2);
        echo "<br>";
        echo "File size: " . $file_size_converted  ."<br>";

    
         echo "<br>";

         if($file_size_converted > 1000) {
            //
              $fileError =  "File is very Large : " . $file_size_converted;
             ///
           } 
           
           if(in_array($file_type, $allowed_files)) {

               echo "The file with the right format was uploaded";
            
           }


        // move

        // if( move_uploaded_file($file__['tmp_name'], $target_file)){
        //     echo "The file : " . $file__['name'] . " has been uploaded";
        // }else {
        //     echo "There was an error while uploading your file ";
        // }
        
    }else if(!empty($_FILES["file"])) {
        //
        switch($_FILES["file"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
                echo "The file you are trying to upload exceeds the maximum";   
        }
        
    }
     echo empty($fileError) ?"":"";

}