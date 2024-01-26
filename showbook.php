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
include 'connectionaddbook.php';
$bid=$_GET["bookId"];
$uname=$_GET["bookName"];
$id=$_GET["authorName"];
$im=$_GET["link"];


$query="insert into bookadd(bookId,bookName,authorName,link) values('$bid','$uname','$id','$im')";
$connect->query($query);

    
    echo "</br>";
    ?>
     <a href="list.php">LIST</a>
        <?php

?>
</body>
</html>