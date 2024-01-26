<?php
include 'connection.php';

// Get user input
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate passwords match
if ($password != $confirm_password) {
    echo "Passwords do not match";
    exit();
}

// Hash the password before storing it in the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement to insert the user into the database
$sql = "INSERT INTO userdata (user_name, email, phone_number, pass) VALUES (?, ?, ?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param('ssss', $user_name, $email, $phone_number, $hashed_password);

if ($stmt->execute()) {
    echo "User registered successfully!";
} else {
    echo "Error registering user: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connect->close();
?>
