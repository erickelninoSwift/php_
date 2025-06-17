<?php

$fruit = ["apple", "mango", "bananas"];

// echo $fruit[1] . "<br>";

$fruit[] = "Pineaple";

// print_r($fruit);

//

$person =  [
    "name" => "erick elnino",
    "surname" => "tshimbombo",
    "age" => 25
];

// foreach($person as $key  => $value) {
//      echo "$key : $value <br>";
// };

// multi dmensional array


$products = (object) [
   "array1" => ["name" => "erick", "surname" => "jackpot", "price" => 180],
   "array2" => ["name" => "jos", "surname" => "kasongo", "price" => 25],
   "array3" => ["name" => "yollande", "surname" => "kasonga", "price" => 70]
];

// print_r ($products -> array1);

// foreach($products as $key => $value) {
//    print_r($products -> array1['name']);
// };


function calculateSum ($currentProducts) {

   $total = (int) 0;

   foreach($currentProducts as $product) {
   
    $total += $product['price'];

};
    return $total;

}

$sum = calculateSum ($products);

// echo "total sum is : {$sum}";


// Super globals

$name = "erick";


function shwoAllData() {
    // you acceess everything through globals
    print_r($GLOBALS['name']);
};

shwoAllData();

// GET will help you to fetch anything that from the query string localhost:3000?name=erick
print_r($_GET['type'] ?? 'null');