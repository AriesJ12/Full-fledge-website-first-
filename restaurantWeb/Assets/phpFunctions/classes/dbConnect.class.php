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

        public function select($columns, $tablename, $condition)
        {
            $sql = "Select $columns from $tablename where $condition;";
            if($result = $this->connect()->query($sql))
            {
                return $result;
            }
            return FALSE;
        }

        public function insert($columns,$tablename, $values)
        {
            $sql = "INSERT into $tablename ($columns) values ($values);";
            try
            {
                $result = $this->connect()->query($sql);

            }catch(Exception $e)
            {
                return "username already exist";
            }
            return TRUE;
        }

        public function update($tablename, $change, $condition)
        {
            $sql = "UPDATE $tablename SET $change WHERE $condition;";
            try
            {
                $result = $this->connect()->query($sql);

            }catch(Exception $e)
            {
                return "username already exist";
            }
            return TRUE;
        }

        public function setSession($row)
        {
            session_start();
            $_SESSION['username']= $row['username'];
            $_SESSION['password']= $row['password'];
        }
    }

?>