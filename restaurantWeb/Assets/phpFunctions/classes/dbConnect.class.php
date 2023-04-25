<?php
    class db
    {
        protected function connect()
        {
            //username and password of sql
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "RestaurantDB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }
    }
?>