<?php 

$file_name = "php_file.txt";
$currentDirectory = __DIR__;
$filePath = __FILE__;


$file = fopen($file_name,"r");
 
if($file) {
    $content = fread($file, filesize($file_name));
    echo nl2br($content);
    fclose($file);
} else {
     echo "Unable to open a file";
}