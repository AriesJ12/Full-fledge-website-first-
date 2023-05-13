<?php
    require "dbConnect.php"; //includes the connection
    //$conn is the name of the object connection


    //gets the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    //sets up the query
    //column
    $column = "username, password, account_type";
    //tablename
    $tablename = "accounts";
    //condition
    $condition = "username = '$username' AND password = '$password' ";
    $sql = "SELECT $column FROM $tablename WHERE $condition;";

    //execute the query
    try {
        $result = $conn->query($sql);
    } catch (PDOException $e) {
        echo $e;
        exit();
    }
    $row = $result->fetch_assoc();
    
    if(is_null($row))
    {
        header("Location: ../login.php?error=Invalid%20Credential&user=$username");
        exit();
    }

    //set session transfer to login
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;

    if($row['account_type'] == 0)
    {
        header("Location: ../../index.php?user=$username");
        exit();
    }
    
    header("Location: ../adminDashboard.php?user=$username");

    $conn->close();
    exit();
?>  