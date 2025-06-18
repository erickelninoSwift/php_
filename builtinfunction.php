<?php 

// built in functions

echo"buit in functions";

echo abs(-200); 
echo round(4.20202, 2);

$numbers = [1,20,11,45,85,3,0];
echo "<br>";

// echo max($numbers);

// string

// $str = "hello" . "<br>";

// echo (int) strlen($str) + 10;

// echo strtoupper($str);


// // Array functions 

// echo count($numbers);

// if(in_array(50, $numbers)) {
//     echo " the number does exist";
// }else {
//     echo "the number does not exist";

$array = [1, 2, 3, 4, 5];

[$first,$second] = $array;

$selectedData = array_slice($array, 1);

echo count($selectedData);