<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav {
            margin-top: 20px;
            width: 100%;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        nav ul li {
            margin-bottom: 15px;
        }

        nav ul li a {
            text-decoration: none;
            font-family: 'Pacifico', cursive; /* Cursive font style */
            color: #3498db;
            font-size: 1.5em;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #2980b9;
        }

        main {
            margin: 20px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <h1>Library Management System - Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="userlist.html">User List</a></li>
            <li><a href="#">Borrowed Books</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </nav>
    <main>
        <?php
        include 'connection.php';
        $sql="select * from userdata";
        $result=$connect->query($sql);
        if($result->num_rows > 0)
        ?>
        <?php
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                echo '<td>';
                echo $row["UserName"];
                echo '</td>';
                echo '<td>';
                echo $row["Email"];
                echo '</td>';
                echo '<td>';
                echo $row["PhoneNumber"];
                echo '</td>';
                echo '<td>';
                echo $row["Password"];
                echo '</td>';
                echo '<td><a class=> Delete </a></td>';
            echo '</tr>';
            }
        ?>
        <!-- Your main content goes here -->
    </main>
</body>
</html>
