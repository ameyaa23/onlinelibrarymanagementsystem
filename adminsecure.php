<?php
// Admin credentials (Replace with your actual admin credentials)
$adminCredentials = [
    'admin@gmail.com' => '123',
    
    // Add more admins as needed
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    // Check if the entered credentials match any admin
    if (array_key_exists($userEmail, $adminCredentials) && $userPassword == $adminCredentials[$userEmail]) {
        // Successful login, redirect to admin dashboard
        header("Location: admndash.html");
        exit();
    } else {
        // Login failed, display error message
        echo "<p class='error-message'>Invalid credentials. Please try again.</p>";
    }
}
?>
