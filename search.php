<!-- search.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Library Management System</title>
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

        /* Add some styling for the Go Back button */
        .go-back {
            text-align: center;
            margin-top: 20px;
        }

        .go-back button {
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>

    <div class="book-list">
        <?php
        include 'connectionaddbook.php';

        // Check if a search query is present
        if (isset($_GET['search'])) {
            $search = $connect->real_escape_string($_GET['search']);
            $query = "SELECT * FROM bookadd WHERE LOWER(bookName) LIKE LOWER('%$search%') OR LOWER(AuthorName) LIKE LOWER('%$search%')";
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
                echo "<p>NO BOOKS FOUND </p>";
            }
        } else {
            echo "<p>Invalid search request</p>";
        }

        // Close the database connection
        $connect->close();
        ?>
    </div>

    <!-- Go Back button -->
    <div class="go-back">
        <button onclick="history.go(-1)">Go Back</button>
    </div>
</body>
</html>
