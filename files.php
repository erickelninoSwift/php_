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

$myContent = file_get_contents($file_name);
echo nl2br($myContent);

//write to a file 

if($file) {
     // write to a file 
     fwrite($file, "\n" ."pharell williams");
       echo "Data was appended successfully";
       fclose($file);
  
} else {
     echo "Unable to open a file";
}