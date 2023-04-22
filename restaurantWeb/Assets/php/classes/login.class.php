
<?php
    require "dbConnect.class.php";
    
    class login extends dbConnect
    {
        $passowrd;
        $username;
        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
        
        private function singIn()
        {
            $sql = "SELECT username, password FROM UserOrAdmin WHERE ". $this->username" ;";
            $result = $this->connect()->query($sql);

            // if(empty($result)) //checks if the username inputted exist in the database
            // {
            //     header("Location: ../../login.html?error=wrongUsername");
            // }
            // if() // condition is (if inputted password is different from the intended password)
            // {
            //    header("Location: ../../login.html?error=wrongPassword"); 
            // }
            // // $row = $result->fetchassoc();
        }
    }
    
?>