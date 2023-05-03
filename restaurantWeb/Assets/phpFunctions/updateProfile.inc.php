<?php
    require "classes/dbConnect.class.php";
    // //site
    $site = $_POST['page'];

    // //gets info
    $uniq_id = $_POST['uniq_id'];
    $username = $_POST['username'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $sex  = $_POST['sex'];
    $email  = $_POST['email'];
    $phone_number  = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    if($_POST['account_type'] == "User")
    {
        $account_type  = 0;

    }
    else
    {
        $account_type = 1;
    }
    if(isset($_POST['active']))
    {
        $active = 1;
    }
    else 
    {
        $active = 0;
    }

    //tablename, what to change, condition
    $tablename = "accounts";
    $change = "username = '$username', first_name = '$first_name', last_name = '$last_name', sex = '$sex', email = '$email', phone_number = '$phone_number', birth_date = '$birth_date', account_type = '$account_type', active = '$active'";
    $condition = "uniq_id = $uniq_id";

    // //create instance of db
    $update = new db();
    $result = $update->update($tablename,$change,$condition);

    if(!is_bool($result))//checks error
    {
        header("Location: $site?uniq_id=$uniq_id&error=$result");
        exit();
    }
    $result = "ChangeSuccessfully";
    header("Location: $site?uniq_id=$uniq_id&prompt=$result");
    exit();

?>