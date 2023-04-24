<?php
    require 'classes/signup.class.php';
    //get the info
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_POST["email"];
    $name = $_POST["name"];


    //give them to the class constructor
    $register = new register($username, $password, $confirmPassword, $email,$name);

    //class executes the process
    $register->signUp();
    
    
    //finished
    header("Location: ../login.html");
?>