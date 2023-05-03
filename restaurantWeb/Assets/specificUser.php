<?php
    require "phpFunctions/classes/dbConnect.class.php";
    $uniq_id = $_GET['uniq_id'];
    $columns = "*";
    $tablename = "accounts";
    $condition = "uniq_id = $uniq_id";

    $select = new db();
    $result = $select->select($columns, $tablename, $condition);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specific User</title>
    <style>
        input[type=text], input[type=datetime], input[type=date]
        {
            display: block;
        }
    </style>
</head>
<body>
    <img src="" alt="Profile Picture">
    <?php echo $row['uniq_id'];?>
    <form method="post" action="phpFunctions/updateProfile.inc.php">
        <input type="hidden" name="page" value = "<?php echo $_SERVER['PHP_SELF']?>">
        <label for="uniq_id">Unique ID:</label>
        <input type="hidden" id="uniq_id" name="uniq_id" required value="<?php echo $row['uniq_id'];?>"><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required value="<?php echo $row['username'];?>"><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required value="<?php echo $row['last_name'];?>"><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required value="<?php echo $row['first_name'];?>"><br>

        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="Male" <?php if($row['sex'] == "Male"){echo "selected";}?>>Male</option>
            <option value="Female" <?php if($row['sex'] == "Female"){echo "selected";}?>>Female</option>
            <option value="Other" <?php if($row['sex'] == "Other"){echo "selected";}?>>Other</option>
        </select><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo $row['email'];?>"><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required value="<?php echo $row['phone_number'];?>"><br>

        <label for="birth_date">Birthdate:</label>
        <input type="date" id="birth_date" name="birth_date" required value=<?php echo $row['birth_date'];?>><br>

        <label for="join_date">Join Date:</label>
        <input type="datetime" id="join_date" name="join_date" disabled required value="<?php echo $row['join_date'];?>"><br>

        <label for="account_type">Account Type:</label>
        <select id="account_type" name="account_type" required>
            <option value="User" <?php if(!$row['account_type']){echo "selected";}?>>User</option>
            <option value="Admin" <?php if($row['account_type']){echo "selected";}?>>Admin</option>
        </select><br>   

        <label for="active">Active:</label>
        <input type="checkbox" id="active" name="active" value="true" <?php if($row['active']){echo "checked";}?>><br>

        <input type="submit" value="Update">
    </form>

</body>
</html>