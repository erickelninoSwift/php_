<?php 

$number = 1000;
$number2 = 2000;

if($number === $number2) {
    echo "EQUAL";
};

echo " TRY AGAIN";

$x = "2";
$y = 2;

if($x === $y) {
    echo "ITS EQUAL";
}

// Ternary or short hand statement

$is_admin = (bool) false;

echo $is_admin ? "welcome admin" : "welcome user";

$age = 80;

$status = (string) $age > 50 ? "Veteran" : "Rookie";

echo $status;
 echo "<br>";
$user = (object)['name' => 'erick elnino', 'age' => 25];
echo $user -> age;

//swtich statement

$yourAge = (int) 100;


switch($yourAge) {
    case $yourAge < 20:
        echo 'bitch';
        break;
        case ($yourAge > 20 && $yourAge < 100):
            echo 'you moma';

        break;

        default : 
        echo "we love you ";
        break;
}