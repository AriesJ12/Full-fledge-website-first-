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
        
        <form name = "registerForm" action = "phpFunctions/register.inc.php" method = "POST">
            <input type="text" name="username" placeholder="Enter your username" id="username" required>
            <br>
            <input type="password" name="password" placeholder="Create a password" id="password" required>
            <br>
            <input type="password" name="confirmPassword" placeholder="Confirm your password" id="confirmPassword" required>
            <br>
            <input type="text" placeholder="Enter your email" name="email" id="email" required>
            <br>
            <input type="text" placeholder="Enter your name" name="name" id="name" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
    <!-- <script src = "js/script.js"></script> -->
</body>
</html>
