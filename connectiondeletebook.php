<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "book";

// Use try-catch for error handling
try {
    $connect = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($connect->connect_error) {
        throw new Exception("Connection failed: " . $connect->connect_error);
    }

    // Do not close the connection here
    
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
