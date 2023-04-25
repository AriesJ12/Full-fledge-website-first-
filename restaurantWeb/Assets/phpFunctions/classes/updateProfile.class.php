<?php
    require "dbConnect.class.php";

    class updateProfile extends db
    {
        private $username;
        private $name;
        private $con;

        function __construct($username, $name)
        {
            //sets up the variable
            $this->username = $username;
            $this->name = $name;
            $this->con = $this->connect();
        }
        
        public function update()
        {
            //execute the update query
            $sql = "UPDATE accounts SET name = '$this->name' WHERE username = '$this->username';";
            $result = $this->con->query($sql);

        }
    }
?>
