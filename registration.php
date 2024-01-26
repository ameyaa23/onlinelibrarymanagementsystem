<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $uname = $_GET["user_name"];
    $em = $_GET["email"];
    $ph = $_GET["phone_number"];
    $pass = $_GET["password"];
    $cpass = $_GET["confirm_password"];

    // Check if passwords match
    if ($pass == $cpass) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        
        // Use prepared statements to prevent SQL injection
        $stmt = $connect->prepare("INSERT INTO userdata(UserName, Email, PhoneNumber, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $uname, $em, $ph, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "Registration successful. ";
            ?>
            <a href="login.html">Proceed to Login</a>
            <?php
        } else {
            echo "Registration failed.";
        }
        $stmt->close();
    } else {
        echo "Password mismatch. Please go back and try again.";
    }
}
?>
