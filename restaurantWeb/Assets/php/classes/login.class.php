
<?php
    require "dbConnect.class.php";
    
    class login extends db
    {
        private $passowrd;
        private $username;
        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
        
        public function signIn()
        {
            $sql = "SELECT username, password FROM accounts WHERE username = '$this->username' ;";
            $result = $this->connect()->query($sql);
            $row = $result->fetch_assoc();
            
            $count = mysqli_num_rows($result);
            
            if($count != 1)
            {
                header("Location: ../login.html?err=NoUser");
                exit();
            }   
            if($this->password !== $row["password"])
            {
                header("Location: ../login.html?err=WrongPass");
                exit();
            }

        }
    }
    
?>