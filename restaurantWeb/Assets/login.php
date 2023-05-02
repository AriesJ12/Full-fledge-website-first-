<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
        <div>
          <!--  <?php
            // error designn
                if(isset($_GET['error']))
                {
                    $error = $_GET['error'];
                    $user = $_GET['user'];
                    echo "<div><p>$error<p></div>";
                }
            ?> -->

            <h1>Log In</h1>
            <div class="about-logo">
                <a href="../index.php" class="logo-content flex">
                    <img src="images/logo-white.png" alt="logo">
                </a> 
            </div>
            <br>
            <form name="loginForm" action="phpFunctions/login.inc.php" method="POST">
                
                <input type="text" name="username" placeholder="Enter your username" id="username" value = "<?php if(isset($_GET['user'])){echo "$user";}?>">
                
                <br>
                <input type="password" placeholder="Enter your password" name="password" id="password">
                <br>
                <input type="submit" value = "Log in">    
            </form>
        </div>
    <!-- <script src="js/script.js"></script>  -->
</body>
</html>
