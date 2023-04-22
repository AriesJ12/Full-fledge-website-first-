<?php
    echo "this is register class";
    require "dbConnect.class.php";
    echo "<br>1";
    class register extends db
    {
        public $username;
        public $password;
        public $confirmPassword;
        public $email;
        public $name;
        public $con;
    
    }
    // class register extends db
    // {
    //     $username;
    //     $password;
    //     $confirmPassword;
    //     $email;
    //     $name;
    //     $con;

    //     function __construct($username, $password, $confirmPassword, $email, $name)
    //     {
    //         echo "first gate";
    //         $con = $this->connect();
    //         $this->con = $con;
    //         $this->username = mysqli_real_escape_string($con,$username); 
    //         $this->password = mysqli_real_escape_string($con,$password);
    //         $this->confirmPassword = $confirmPassword;
    //         $this->email = mysqli_real_escape_string($con,$email);
    //         $this->name = mysqli_real_escape_string($con,$name);
    //         echo "second gate";
    //     }

    //     function signUp()
    //     {
    //         $sql = "INSERT INTO accounts (username, password, email, name)  values ('$this->username', '$this->password','$this->email','$this->name');";
    //         $result = $con->query($sql);
    //     }
    // }
?>