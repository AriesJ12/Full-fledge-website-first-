<?php
    class db
    {
        function connect()
        {
            //username and password of sql
            $servename = "localhost";
            $user = "root";
            $password = "";
            $dbname = "RestaurantDB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                echo "Connection error";
                die("Connection failed: " . $conn->connect_error);
            }
        }
    }
?>