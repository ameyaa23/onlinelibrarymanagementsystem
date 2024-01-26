<?php
include 'connectionaddbook.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["bookId"])) {
        $bookId = $_POST["bookId"];

        // Retrieve book details based on the provided Book ID
        $query = "SELECT * FROM bookadd WHERE bookId = ?";
        $stmt = $connect->prepare($query);

        if ($stmt) {
            $stmt->bind_param('i', $bookId);
            $stmt->execute();
            $result = $stmt->get_result();
            $bookDetails = $result->fetch_assoc();
            $stmt->close();

            if ($bookDetails) {
                // Display the form with the existing book details
                echo "<form method='POST' action='process_update.php'>
                        <input type='hidden' name='bookId' value='{$bookDetails['bookId']}'>
                        <label for='bookName'>Book Name:</label>
                        <input type='text' id='bookName' name='bookName' value='{$bookDetails['bookName']}' required>
                        <label for='AuthorName'>Author Name:</label>
                        <input type='text' id='AuthorName' name='AuthorName' value='{$bookDetails['AuthorName']}' required>
                        <!-- Add other fields as needed -->
                        <button type='submit'>Update Book</button>
                      </form>";
            } else {
                echo "Book not found";
            }
        } else {
            echo "Error in preparing SQL statement";
        }
    } else {
        echo "Missing bookId parameter";
    }
} else {
    echo "Invalid request";
}

$connect->close();
?>
