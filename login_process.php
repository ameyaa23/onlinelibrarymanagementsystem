<?php
include 'connectionaddbook.php';

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the connection is successful
if ($connect) {
    // Prepare the SQL statement with placeholders
    $sql = "SELECT email, password FROM userdata WHERE email=?";
    $stmt = $connect->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        $stmt->bind_param('s', $email);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the result set
            $result = $stmt->get_result();

            // Check if there is a matching user
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $row['password'])) {
                    // Password is correct
                    // Redirect to list.php
                    header("Location: list.php");
                    exit();
                } else {
                    // Invalid password
                    echo "Invalid email or password";
                }
            } else {
                // No matching user
                echo "Invalid email or password";
            }
        } else {
            // Handle errors here
            echo "Error executing the query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle errors here
        echo "Error preparing the statement: " . $connect->error;
    }

    // Close the connection
    $connect->close();
} else {
    // Handle errors here
    echo "Error connecting to the database";
}
?>
