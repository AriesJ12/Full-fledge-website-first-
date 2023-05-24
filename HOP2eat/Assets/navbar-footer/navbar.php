<?php
    session_start();

    
    if(isset($_SESSION['username']))
    {
        if($_SESSION['account_type'] == FALSE)
        {
            require_once "navbars/user.php";
        }
        else
        {
            require_once "navbars/admin.php";
        }
    }    
    else
    {
        require_once "navbars/guest.php";
    }
?>