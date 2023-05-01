<?php
    require "classes/dbConnect.class.php"; //includes the necessary class

    //gets the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    //column
    $column = "username, password";
    //tablename
    $tablename = "accounts";
    //condition
    $condition = "username = '$username' AND password = '$password' ";

    //create instance of class
    $login = new db();

    //use select since you are trying to login
    $row = $login->select($column, $tablename, $condition);

    if(is_bool($row))
    {
        $error = "error=ConnectionFailed&user=$username";
        header("Location: ../login.php?$error");
        exit();        
    }
    if(is_null($row))
    {
        $error = "error=InvalidCredentials&user=$username";
        header("Location: ../login.php?$error");
        exit();
    }

    
    //if everything goes well go to the home page
    //starts session and go to homepage
    header("Location: ../../index.php");
    exit();
?>  