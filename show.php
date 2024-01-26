<html>
<head>
    <style>
.buttons {
            display: flex;
            flex-direction: column;
            padding: 10px 20px;
      
            
        }
        .login-button {
            gap: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
</style>
</head>
<body>
SIGN UP SUCCESSFUL
<div class="buttons">
   <a class="login-button" href="http://127.0.0.1/library/unda.html" target="_blank">Login</a>
</div>
<?php
include 'connectionaddbook.php';

// Use $_POST to retrieve form data
$uname = $_POST["user_name"];
$em = $_POST["email"];
$ph = $_POST["phone_number"];
$pass = $_POST["password"];
$cpass = $_POST["confirm_password"];

$query = "INSERT INTO userdata(UserName, Email, PhoneNumber, Password) VALUES ('$uname', '$em', '$ph', '$pass')";

if ($connect->query($query)) {
    // Registration successful
    echo "SIGN UP SUCCESSFUL";

    if ($pass == $cpass) {
        echo "<div class='buttons'>";
        echo "<a class='login-button' href='http://127.0.0.1/library/unda.html' target='_blank'>Login</a>";
        echo "</div>";
    } else {
        echo "Password mismatch";
    }
} else {
    // Error in query execution
    echo "Error: " . $connect->error;
}

$connect->close();
?>
