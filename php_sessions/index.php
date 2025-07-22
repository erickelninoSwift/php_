<?php 
// session
session_start();

$_SESSION['username'] = 'Erick Tshimbombo Kazadi' ?? "Guest";
var_dump($_SESSION['username']);

// session_destroy();