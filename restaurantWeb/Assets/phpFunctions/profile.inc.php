<?php
    require "classes/updateProfile.class.php";
    session_start();
    //gets the data
    $username = $_SESSION["username"];
    $name = $_POST["name"];
    //gives the info
    $update = new updateProfile($username, $name);
    
    //execute the update
    $update->update();

    //update the session
    $_SESSION["name"] = $name;

    //head to profile again
    header("Location: ../profile.php");
    exit();
?>