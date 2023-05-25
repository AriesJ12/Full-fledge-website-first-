<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        require_once "../Assets/phpFunctions/dbConnect.php";

        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];

        $sql = "INSERT INTO account(username, password, email, first_name, last_name) values ('$username','$password','$email','$first_name','$last_name',)";
    
        // execute
        $result = $conn->query($sql); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../Assets/css/registerstyle.css">
</head>
<body>
    <div>
        <h1>Register</h1>
        <div class="about-logo">
            <a href="../index.php" class="logo-content flex">
                <img src="images/logo-white.png" alt="logo">
            </a> 
        </div>
        <br>
        
        <form name = "registerForm" action = "" method = "POST">
            <input type="text" name="username" placeholder="Enter your username" id="username" required>
            <br>
            <input type="password" name="password" placeholder="Create a password" id="password" required>
            <br>
            <input type="password" name="confirm_password" placeholder="Confirm your password" id="confirmPassword" required>
            <br>
            <input type="text" placeholder="Enter your email" name="email" id="email" required>
            <br>
            <input type="text" placeholder="Enter your first name" name="first_name" id="first_name" required>
            <br>
            <input type="text" placeholder="Enter your last name" name="last_name" id="last_name" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
    <!-- <script src = "js/script.js"></script> -->
</body>
</html>
