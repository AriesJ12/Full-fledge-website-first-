<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <div>
        
    </div>
    <div>
        Hello
        <br>
        <a href="../index.php">Home</a>
        <form name= "profileForm" action="phpFunctions/profile.inc.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $_SESSION["username"]?>" disabled>
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $_SESSION["email"]?>" disabled>
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $_SESSION["name"]?>">
            
            <input type="submit" value="Save Credentials">
        </form>
        <br><br><br>
    </div>
</body>
</html>