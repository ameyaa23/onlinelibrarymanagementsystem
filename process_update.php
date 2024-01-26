<?php
include 'connectionaddbook.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["bookId"];
    $bookName = $_POST["bookName"];
    $authorName = $_POST["AuthorName"];

    // Add other fields as needed

    // Update the book details in the database
    $query = "UPDATE bookadd SET bookName = ?, AuthorName = ? WHERE bookId = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('ssi', $bookName, $authorName, $bookId);
    $stmt->execute();
    $stmt->close();

    echo "Book updated successfully";
} else {
    echo "Invalid request";
}

$connect->close();
?>
