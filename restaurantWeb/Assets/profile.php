<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profile</h1>
    <div>
        Hello
        <?php
            session_start();
            echo $_SESSION["username"].", this is your profile";
        ?>
        <form name= "profileForm" action="phpFunctions/profile.inc.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $_SESSION["username"]?>" disabled>
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $_SESSION["email"]?>" disabled>
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $_SESSION["name"]?>">
            
            <!-- needs a change password option -->
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php echo $_SESSION["password"]?>" disabled>

            <input type="submit" value="Save Credentials">
        </form>
    </div>
</body>
</html>