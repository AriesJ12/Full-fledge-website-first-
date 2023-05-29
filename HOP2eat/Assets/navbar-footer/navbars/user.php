<nav class="navbar sticky-md-top navbar-expand-md navbar-dark text-bg-dark borders navbar-height">
    <div class="container fs-5 class">
      <a class="navbar-brand" href="<?php echo $index_page_directory?>index.php">
        <img src="<?php echo $logo_directory?>logo-white.png"
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
     
      <div class="dropdown">
        <div class="align-middle border p-2 rounded dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hello, <?php echo $_SESSION['username']?>
          <img src="https://picsum.photos/200/300" height = "30" width = "40" alt="" class="img-thumbnail" >
        </div>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="<?php echo $user_page_directory?>profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="<?php echo $user_page_directory?>logout.php">Logout</a></li>
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>