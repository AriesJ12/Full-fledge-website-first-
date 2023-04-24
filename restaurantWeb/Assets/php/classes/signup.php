<?php
    require "dbConnect.class.php";
    class register extends db
    {
        private $username;
        private $password;
        private $confirmPassword;
        private $email;
        private $name;
        private $con;
        
        function __construct($username, $password, $confirmPassword, $email, $name)
        {
            $con = $this->connect();
            $this->con = $con;
            $this->username = mysqli_real_escape_string($con,$username); 
            $this->password = mysqli_real_escape_string($con,$password);
            $this->confirmPassword = $confirmPassword;
            $this->email = mysqli_real_escape_string($con,$email);
            $this->name = mysqli_real_escape_string($con,$name);
        }
    
        public function signUp()
        {
            
            $sql = "INSERT INTO accounts (username, password, email, name)  values ('$this->username', '$this->password','$this->email','$this->name');";
            $result = $this->con->query($sql);
        }
    }
    // class register extends db
    // {
    

    //     function signUp()
    //     {
    //     }
    // }
?>