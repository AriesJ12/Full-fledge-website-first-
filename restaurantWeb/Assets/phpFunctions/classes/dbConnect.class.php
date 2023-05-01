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

        protected function select($columns, $tablename)
        {
            $sql = "Select $columns from $tablename;";
        }

        protected function select($columns, $tablename, $condition)
        {
            $sql = "Select $columns from $tablename where $condition;";
            $result = $this->connect()->query($sql);
        }

        protected function insert($columns,$tablename, $values)
        {
            $sql = "INSERT into $tablename ($columns) values ($values);";
            $result = $this->connect()->query($sql);
        }

        protected function update($tablename, $change, $condition)
        {
            $sql = "UPDATE $tablename SET $change WHERE $condition;";
            $result = $this->con->query($sql);
        }
    }

?>