<?php 

$file_name = "php_file.txt";
$currentDirectory = __DIR__;
$filePath = __FILE__;


$file = fopen($file_name,"a");
 
// if($file) {
//     $content = fread($file, filesize($file_name));
//     echo nl2br($content);
//     fclose($file);
// } else {
//      echo "Unable to open a file";
// }

// another way 

// $myContent = file_get_contents($file_name);
// echo nl2br($myContent);

//write to a file 

// if($file) {
//      // write to a file 
//      fwrite($file, "\n" ."pharell williams");
//        echo "Data was appended successfully";
//        fclose($file);
  
// } else {
//      echo "Unable to open a file";
// }

// metadeta

if(file_exists($file_name)) { 

    $currentFileSize = (float) ((filesize($file_name)) / 1000);

     echo "File size : " . ($currentFileSize > 1 ? $currentFileSize : 1) . " Kb\n";
     echo "<br>";
   echo "Last modified: " . date("D M Y H:i " . filemtime($file_name) ) ."\n";
}else {
    echo "File does not Exist";
}

// check if the file readable or writeable
if(is_readable($file_name)) {
    echo "\n Yes, this file is readable \n";
};

if(is_writable($file_name)) {
    echo "\n Yes this file is writeable ";
};

// rename and delete a file ;

$old_name = "php_file.txt";
$new_name = "jackpot.txt";

if(file_exists($old_name)) {
    rename($old_name,$new_name);
}else {
    echo "There is no files with name: {$old_name}";
};

// check if file exist then delete
if(file_exists($new_name)) {
    unlink($new_name);
    echo "file was deleted successfully";
};