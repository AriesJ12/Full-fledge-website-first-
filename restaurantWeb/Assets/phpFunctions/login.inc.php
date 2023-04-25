<?php
    require "classes/signin.class.php"; //includes the necessary class

    //gets the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    //give the data to the class
    $log = new login($username, $password);

    //the class execute the login process
    $log->signIn();

    
    //if everything goes well go to the home page
    //starts session and go to homepage
    header("Location: ../../index.php");
?>  