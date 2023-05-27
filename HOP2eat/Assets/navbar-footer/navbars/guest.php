<nav class="navbar sticky-md-top navbar-expand-lg navbar-light bg-light border">
      <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo $index_page_directory?>index.php">
              <img src="<?php echo $logo_directory?>logo-black3.png" 
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
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="about_us_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="about_us_dropdown">
                    <li><a class="dropdown-item" href="<?php echo $user_page_directory?>about_us.php">Who are we?</a></li>
                    <li><a class="dropdown-item" href="<?php echo $user_page_directory?>faqs.php">Faqs</a></li>
                    </ul>
                </li>
              </ul>
              
          </div>
          <form class="d-flex w-75" role="search" method = "GET" action = "<?php echo $user_page_directory;?>search.php">
            <div class="input-group">              
                <input type="text" aria-label="find_name" class="form-control w-25" id="find_name" name = "find_name" placeholder="Restaurant">
                <input type="text" aria-label="find_location" class="form-control w-50" id="find_location" name = "find_location" placeholder = "region, province, city/barangay">
            </div>
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