<?php
    //username and password of sql
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hope2eat";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        
        die("Connection failed: " . $conn->connect_error);
    }
    //to execute a query
    // type $conn->query
    
?>