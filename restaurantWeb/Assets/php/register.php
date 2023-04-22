<?php
    require 'classes/signup.php';
    //get the info
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_POST["email"];
    $name = $_POST["name"];

    echo "0gate";

    //give them to the class constructor
    $register = new register();

    echo "1gate";

    //class executes the process
    $register->signUp();
    
    
    //finished
    //header("Location: ../login.html");
?>