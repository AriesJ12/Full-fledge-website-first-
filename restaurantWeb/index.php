<!DOCTYPE html>
<!-- home page -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="Assets/css/styles.css">
</head>
<body>
    <div>
        <h1>Homepage</h1>
        <br>
        
        <br><br>
        <p>
            Hello
            <?php //must rewrite the code below; preferrably with js/ajax but php function is doable too
                session_start();
                $name;
                if (isset($_SESSION["username"]))
                {
                    $name = $_SESSION["username"];
                    echo "$name";
                    echo "<br><a href = 'Assets/profile.php'>Profile</a>";
                    echo "<br><a href='Assets/php/logout.php'>Logout</a>";
                }
                else 
                {
                    $name = "GUEST";
                    echo "$name";
                    echo "<br>
                    <a href='Assets/login.php'>login</a>
                    <br>
                    <a href='Assets/register.php'>register</a>
                    ";
                }
            ?>
        </p>
    </div>
</body>
</html>