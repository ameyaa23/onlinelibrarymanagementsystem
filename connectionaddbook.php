<?php

$localhost = "127.0.0.1";
$bookid = "root"; // Correct variable name
$password = "";
$dbname = "book";

// Use the correct variable name ($bookid) in the mysqli constructor
$connect = new mysqli($localhost, $bookid, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

?>
