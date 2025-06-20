<?php 

$file_name = "php_file.txt";
$currentDirectory = __DIR__;
$filePath = __FILE__;


$file = fopen($file_name,"r+");

if (file_exists($file)) {
    echo "file do exist";
}else{
    echo "file doesnt exist";
}

echo $currentDirectory;
echo "<br>";
echo $filePath;