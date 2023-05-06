
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
            
        }
    }
    
?>