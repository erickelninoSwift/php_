<?php 
// we will learn how to create directories and list data in the directory

$directory = "movies";


// check if the directory exist if not then create one
if(!file_exists($directory)){
    mkdir($directory,0777, true);
    echo "Derectory was created";
} else {
    echo "Directory already exists";
};

//
// check
if(is_dir($directory)){
    $files = scandir($directory);
    foreach($files as $file){
        if($file != "."&& $file != ".."){
            echo "<br>" . "File: {$file} ";
        };
    }
}