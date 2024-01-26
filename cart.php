<!-- cart.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming your connection.php file is included here
    include 'connection.php';

    // Process selected books
    if (isset($_POST['selected_books']) && !empty($_POST['selected_books']) && isset($_POST['quantity']) && $_POST['quantity'] > 0) {
        $selectedBooks = $_POST['selected_books'];
        $quantity = $_POST['quantity'];

        // Process the selected books as needed (e.g., add to cart, update database, etc.)
        // Here, we'll just print the selected book IDs and quantity for demonstration purposes
        echo "<h2>Selected Books:</h2>";
        echo "<ul>";
        foreach ($selectedBooks as $bookId) {
            echo "<li>Book ID: $bookId</li>";
        }
        echo "</ul>";
        echo "<p>Quantity: $quantity</p>";

        // You can add your logic here to update the database or perform other actions with the selected books.
    } else {
        echo "<p>No books selected or invalid quantity.</p>";
    }

    // Close the database connection
    $connect->close();
} else {
    // Redirect to the index page if accessed directly
    header("Location: list.php");
    exit();
}
?>
