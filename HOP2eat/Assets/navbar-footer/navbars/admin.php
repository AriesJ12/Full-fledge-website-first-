<?php
    //get basae name
    $current_file = basename( $_SERVER['PHP_SELF']);

    //store all pages in an array
    $pages_user = array("find_something.php", "cuisine.php", "reservation.php", "service.php", "about_us.php", "login.php", "register.php","profile.php", "logout.php");
    $pages_admin = array("add_restaurant.php", "view_user.php");
    $index = array("index");
    
    //set the directory
    if(in_array($current_file, $pages_user))
    {
        $index_page_directory = "../";
        $user_page_directory = "./";
        $admin_page_directory = "admin/";  
        $logo_directory = "../Assets/images/";      
    }
    else if(in_array($current_file, $pages_admin))
    {
        $index_page_directory =  "../../";
        $user_page_directory = "../";
        $admin_page_directory = "./";
        $logo_directory = "../../Assets/images/";
    }
    else
    {
        $index_page_directory = "./";
        $user_page_directory = "pages/";
        $admin_page_directory = "pages/admin/";
        $logo_directory = "Assets/images/";     
    }
?>

<nav class="navbar sticky-md-top navbar-expand-md navbar-light bg-light borders">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo $index_page_directory?>index.php">
        <img src="<?php echo $logo_directory?>logo(black).png"
        class = "navbar-brand"
        alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
        <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Discover
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $user_page_directory?>find_something.php">Find Something</a></li>
                  <li><a class="dropdown-item" href="<?php echo $user_page_directory?>cuisine.php">Cuisine</a></li>
                  </ul>
                </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo $user_page_directory?>reservation.php">Reservation</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo $user_page_directory?>service.php">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo $user_page_directory?>about_us.php">About us</a>
              </li>
              </ul>
      </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success me-2" type="submit">Search</button>
      </form>    
      <div class="dropdown">
        <div class="align-middle border p-2 rounded dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hello, <?php echo $_SESSION['username']?>
          <img src="https://picsum.photos/200/300" height = "30" width = "40" alt="" class="img-thumbnail" >
        </div>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="<?php echo $user_page_directory?>profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="<?php echo $user_page_directory?>logout.php">Logout</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="<?php echo $admin_page_directory?>add_restaurant.php">Add restaurant</a></li>
          <li><a class="dropdown-item" href="<?php echo $admin_page_directory?>view_user.php">View users</a></li>
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>