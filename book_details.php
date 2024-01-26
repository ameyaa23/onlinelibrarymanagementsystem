<!-- book_details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details - Library Management System</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .book-details {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php
    // Check if the selectedBook parameter is set in the URL
    if (isset($_GET['selectedBook'])) {
        $selectedBookId = $_GET['selectedBook'];

        // Fetch book details based on the selected book ID
        include 'connection.php'; // Assuming this file establishes the database connection

        $query = "SELECT * FROM bookadd WHERE bookId = $selectedBookId";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {
            // Display book details
            $bookDetails = $result->fetch_assoc();
            echo "<div class='book-details'>
                    <h2>Book Details</h2>
                    <p><strong>Book ID:</strong> {$bookDetails['bookId']}</p>
                    <p><strong>Book Name:</strong> {$bookDetails['bookName']}</p>
                    <p><strong>Author:</strong> {$bookDetails['AuthorName']}</p>
                    <p><strong>Link:</strong> <a href='{$bookDetails['link']}' target='_blank'>{$bookDetails['link']}</a></p>
                 </div>";
        } else {
            echo "<p>No details found for the selected book.</p>";
        }

        // Close the database connection
        $connect->close();
    } else {
        echo "<p>No book selected.</p>";
    }
    ?>
</body>
</html>
