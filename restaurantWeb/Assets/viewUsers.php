<?php
    include "phpFunctions/classes/dbConnect.class.php";
    $columns = "*";
    $tablename = "accounts";
    $condition = "uniq_id >= 0";
    $select = new db();
    $result = $select->select($columns, $tablename, $condition);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>

    <style>
        h1{
            color:white;
        }
        body{
            background: black;
        }
        .mainBox{
            background: white;
            display: inline-block;
            position: relative;
            height: 300px;
            width: 200px;
            margin: 30px;
            padding: 20px;
            border-radius: 10%;
        }
        img{
            margin: auto;
            display: block;
            height: 80px;
            width: 80px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>View Users</h1>
    <?php
        while($row = $result->fetch_assoc())
        {
    ?> 
    <div class = "mainBox">
        <!-- <div class = "upper"></div> -->
        <!-- red for disabled, blue for active -->
        <img src="https://www.nj.com/resizer/zovGSasCaR41h_yUGYHXbVTQW2A=/1280x0/smart/cloudfront-us-east-1.images.arcpublishing.com/advancelocal/SJGKVE5UNVESVCW7BBOHKQCZVE.jpg" alt="Profile Picture">
        <span>
            uniq_id:
            <?php echo $row['uniq_id'];?>

        </span><br>
        <span>
            <?php echo $row['username'];?> 

        </span><br>
        <span>
            <?php echo $row['last_name'];?>

        </span><br>
        <span>
            <?php echo $row['first_name'];?>

        </span><br>
        <span>
            <?php echo $row['birth_date'];?>

        </span><br>
        <!-- clickable -->
    </div>

    <?php
        }
    ?>
    
</body>
</html>