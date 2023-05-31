<?php
    //get basae name
    $current_file = basename( $_SERVER['PHP_SELF']);

    //store all pages in an array
    $pages_user = array("find_something.php", "cuisine.php", "reservation.php", "service.php", "about_us.php", "login.php", "register.php","profile.php", "logout.php", "search.php", "faqs.php", "review.php", "search_cuisine.php", "donation.php");
    $pages_admin = array("add_restaurant.php", "view_user.php");
    $index = array("index");
    
    //set the directory
    if(in_array($current_file, $pages_user))
    {
        $index_page_directory = "../";
        $user_page_directory = "./";
        $admin_page_directory = "admin/";  
        $logo_directory = "../Assets/images/homepage/";    
        $profile_directory = "../Assets/images/userImages/";  
    }
    else if(in_array($current_file, $pages_admin))
    {
        $index_page_directory =  "../../";
        $user_page_directory = "../";
        $admin_page_directory = "./";
        $logo_directory = "../../Assets/images/homepage/";

        $profile_directory = "../../Assets/images/userImages/";
    }
    else
    {
        $index_page_directory = "./";
        $user_page_directory = "pages/";
        $admin_page_directory = "pages/admin/";
        $logo_directory = "Assets/images/homepage/";
        
        $profile_directory = "Assets/images/userImages/";  
    }
?>

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