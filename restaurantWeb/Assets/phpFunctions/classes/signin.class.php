
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
            $sql = "SELECT username, password, email, name FROM accounts WHERE username = '$this->username' ;";
            $result = $this->connect()->query($sql);
            $row = mysqli_fetch_assoc($result);
            
            $count = mysqli_num_rows($result);
            
            if($count != 1)//checks if record exist
            {
                header("Location: ../login.php?err=NoUser");
                exit();
            }   
            if($this->password !== $row["password"])//check the password
            {
                header("Location: ../login.php?err=WrongPass");
                exit();
            }
            //gets the information
            session_start();
            $_SESSION["username"] = $this->username;
            $_SESSION["password"] = $this->password;
            $_SESSION["email"] = $row["email"];
            $_SESSION["name"] = $row["name"];
            
        }
    }
    
?>