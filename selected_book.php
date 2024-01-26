<!-- selected_book.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Books - Library Management System</title>
    <style>
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

        .selected-books {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .column {
            flex: 0 0 30%;
            margin: 10px;
        }

        .book {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            margin-bottom: 10px;
        }

        .book img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Selected Books</h1>

    <div class="selected-books">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the selected books
            if (isset($_POST['bookCheckbox'])) {
                $selectedBooks = $_POST['bookCheckbox'];

                // Display selected books
                include 'connectionaddbook.php';

                foreach ($selectedBooks as $bookId) {
                    $query = "SELECT * FROM bookadd WHERE bookId = $bookId";
                    $result = $connect->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
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
                }

                // Close the database connection
                $connect->close();
            } else {
                echo "<p>No books selected</p>";
            }
        } else {
            echo "<p>Invalid access</p>";
        }
        ?>
    </div>
</body>
</html>
