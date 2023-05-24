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
    }
    else if(in_array($current_file, $pages_admin))
    {
        $index_page_directory =  "../../";
        $user_page_directory = "../";
        $admin_page_directory = "./";        
    }
    else
    {
        $index_page_directory = "./";
        $user_page_directory = "pages/";
        $admin_page_directory = "pages/admin/";        
    }
?>


    <nav class="navbar sticky-md-top navbar-expand-lg navbar-light bg-light border">
      <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo $index_page_directory?>index.php">
              <img src="<?php echo $imageDefaultDirectory?>logo-black3.png" 
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
    
          <div class="align-items-middle">
              <button type="button" class="btn btn-danger"><a href="<?php echo $user_page_directory?>login.php" class = "nav-link">Login</a></button>
              <button type="button" class="btn btn-outline-danger"><a href="<?php echo $user_page_directory?>register.php" class = "nav-link">Register</a></button>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
  </nav>