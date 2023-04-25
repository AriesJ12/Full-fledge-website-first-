<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <script src="js/script.js"></script>  -->
</head>
<body>
    <div>
        <h1>Login page</h1>
        <a href="../index.html">Home page</a>
        <br>
        <form name="loginForm" action="phpFunctions/login.inc.php" method="POST">
            <label for="username">
                Username
            </label>
            <input type="text" name="username" id="username">
            
            <label for="password">
                Password:
            </label>
            <input type="password" name="password" id="password">
            <br>
            <input type="submit" value = "Log in">    
        </form>
    </div>
</body>
</html>