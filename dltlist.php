<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books - Library Management System</title>
    <style>
        /* Add CSS styles for book listings */
        body {
            background: url('https://img.freepik.com/free-photo/open-book-icon-symbol-yellow-background-education-bookstore-concept-3d-rendering_56104-1334.jpg?w=996&t=st=1702582654~exp=1702583254~hmac=4b833946969558adca6f69bc6785589f3227a5bfdb3a16dc44d740d38104e6e3') center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #fff;
            padding: 20px;
        }

        .book-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .column {
            flex: 0 0 30%; /* Adjust as needed */
            margin: 10px;
        }

        .book {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* Set background color for book container */
            margin-bottom: 10px;
        }

        .book img {
            max-width: 100%;
            height: auto;
        }

        .cart {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            background-color: #fff; /* Set background color for cart container */
        }

        /* Add some styling for the search form */
        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 5px;
        }

        .search-form button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>Available Books</h1>

        <div class="book-list">
        <?php
        include 'connection.php';

        // Query to fetch book data
        $query = "delete FROM bookadd";
        $result = $connect->query($query);
        


        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='column'>
                        <div class='book'>
                            <h3>Book ID: {$row['bookId']}</h3>
                            <p>Book Name: {$row['bookName']}</p>
                            <p>Author: {$row['AuthorName']}</p>
                            <p>Link: {$row['link']}</p>
                            <a href='{$row['link']}' target='_blank'><button>Go to Link</button></a>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>No books available</p>";
        }

        // Close the database connection
        $connect->close();
        ?>
    </div>
</body>
</html>
