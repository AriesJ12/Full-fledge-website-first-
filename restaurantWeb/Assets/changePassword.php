<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form name = "changePasswordForm" action="phpFunctions/changePassword.inc.php" 
    method="post" onsubmit = "return validateChangePassword(<?php echo "'".$_SESSION['password']."'";?>)">
    <!-- so much apostrophe ;-; needed because you must pass it as a "string" lol -->
    <label for="oldPassword">
        <input type="password" name="oldPassword" id="oldPassword">
    </label>
    <label for="newPassword">
        <input type="password" name="newPassword" id="newPassword">
    </label>
    <label for="confirmPassword">
        <input type="password" name="confirmPassword" id="confirmPassword">
    </label>
    
    <input type="submit" value="Change Password">
    </form>
    <!-- <script src = "js/script.js"></script> -->
</body>
</html>