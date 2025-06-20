<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    $searchQuery = htmlspecialchars(trim($_GET["search"]));

    if(!empty($searchQuery)) {
        // logic
        echo "This is what your about to search : ".$searchQuery."<br>";
    }else {
        echo "Please Make sure the input field is not empty";
    }
}