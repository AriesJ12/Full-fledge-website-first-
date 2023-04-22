
<?php
    require "dbConnect.class.php";
    
    class login extends dbConnect
    {
        $passowrd;
        $user;
        function __construct($user, $password)
        {
            $this->$user = $user;
            $this->$password = $password;
        }
        
        function singIN()
        {
            $sql = "SELECT username, password FROM UserOrAdmin WHERE /$user";
            $result = parent::connect()->query($sql);
            $row = $result->fetchassoc();
        }
    }
    
?>