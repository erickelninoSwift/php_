<?php 

$file_name = "php_file.txt";
$currentDirectory = __DIR__;
$filePath = __FILE__;


$file = fopen($file_name,"w");
 
// if($file) {
//     $content = fread($file, filesize($file_name));
//     echo nl2br($content);
//     fclose($file);
// } else {
//      echo "Unable to open a file";
// }

// another way 

$myContent = file_get_contents($file_name);
echo nl2br($myContent);

//write to a file 

if($file) {
     // write to a file 
     if(file_put_contents($file_name, "You love me so much", FILE_APPEND | LOCK_EX ) !== false) {
         echo "Data was appended successfully";
     }
   
} else {
     echo "Unable to open a file";
}