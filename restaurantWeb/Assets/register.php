<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
    <div>
        <a href="../index.php">Home page</a>
        <br>
        <form name = "registerForm" action = "phpFunctions/register.inc.php" onsubmit="return validate()" method = "POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required>
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
    <!-- <script src = "js/script.js"></script> -->
</body>
</html>