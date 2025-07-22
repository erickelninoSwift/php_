<?php

// learn about functions in php

function greet() {
    echo "Welcome back everyone";
}

function addNumber ($num1,$num2) {
    return $num1 + $num2;
}

// $total = (int) addNumber(10,25);
// echo "<br>";
// echo $total;


// fimd even mumber;

function isEventNumber ($number): bool {

    echo $number . "<br>";
    echo $number % 2 . "<br>";
  return $number % 2 === 0 ? true : false;
}

isEventNumber(185);

var_dump(isEventNumber(200));