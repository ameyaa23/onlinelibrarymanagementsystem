<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books - Library Management System</title>
    <style>
        /* Add CSS styles for book listings */
        .book-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .book {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
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
        }
    </style>
</head>
<body>
    <h1>Available Books</h1>
    <div class="book-list">
        <?php
        include 'connection.php';

        // Query to fetch book data
        $query = "SELECT * FROM bookadd";
        $result = $connect->query($query);

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='book'>
                        <h3>{$row['bookName']}</h3>
                        <p>Author: {$row['AuthorName']}</p>
                        <p>Link: {$row['link']}</p>
                        <a href='{$row['link']}' target='_blank'><button>Go to Link</button></a>
                      </div>";
            }
            
            }
         else {
            echo "<p>No books available</p>";
        }

        // Close the database connection
        $connect->close();
        ?>
    </div>

    
    </script>
</body>
</html>