<html>
<head>
<style>
.buttons {
            display: flex;
            flex-direction: column;
            padding: 10px 20px;
      
            
        }
        .login-button {
            gap: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
</style>
</head>
<body>

<div class="buttons">
   <a class="login-button" href="http://127.0.0.1/library/list.php" target="_blank">Login</a>
</div>
</head>
<body>
<?php
include 'connectiondeletebook.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bid = $_GET["bookId"];
    $bname = $_GET["bookName"];
    $an = $_GET["AuthorName"];

    $query = "INSERT INTO bookdelete(bookId,bookName,AuthorName) VALUES ('$bid', '$bname', '$an')";
    // Check if all required fields are provided
    if (!empty($bid) && !empty($bname) && !empty($an)) {
        // Construct and execute the delete query
        $query = "DELETE FROM bookadd WHERE bookId='$bid' AND bookName='$bname' AND AuthorName='$an'";
        $result = $connect->query($query);

        if ($result) {
            echo "BOOK DELETED SUCCESSFULLY!";
        } else {
            echo "Error deleting book: " . $connect->error;
        }
    } else {
        echo "Please provide all required fields.";
    }
}
?> 