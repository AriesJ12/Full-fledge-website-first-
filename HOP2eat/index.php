<!-- setting up php -->
<?php 
    require_once "Assets/phpFunctions/dbConnect.php";
    //image directory for the not in the db images
    $imageDefaultDirectory = "Assets/images/homepage/";
    $imageRestaurantDirectory = "Assets/images/restaurantImages/";
    $imageCuisineDirectory = "Assets/images/cuisineImages/";
    $max_carousel = 3; 
    $https = "https://";
    
    $restaurant_per_carousel = 2;

    $sql = "CALL get_restaurant();";
    if ($conn->multi_query($sql)) {
        $restaurant = $conn->store_result(); // Get the restaurant result set
    
        $conn->next_result(); // Move to the next result set
    
        // Cuisine carousel
        $cuisine_per_carousel = 3;
    
        $sql = "CALL get_cuisine();";
        if ($conn->multi_query($sql)) {
            $cuisine = $conn->store_result(); // Get the cuisine result set
        }
    
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="Assets/css/style.css?v=6">
</head>
<body class="index custom-dark-dark-bg" data-bs-theme = "dark">
    
    <!-- navbar -->
    <?php require_once "Assets/navbar-footer/navbar.php"?>
  <!-- header -->
    <header class="container-fluid p-0">
      
        <!-- carousel headeer -->
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-theme="light">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>            
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="3500" class="carousel">
                    <div class="row text-light text-center carousel-content"> 
                        <div class="col-md-6 pt-5 pb-5 m-auto">
                            <h1 class="display-5 pb-2 fw-bold">WELCOME TO HOP2eat</h1>
                            <p>
                                Still haven’t found that sweet spot?
                                Use our search filters to help you find your next amazing meal.<br>
                                
                            </p>

                            <form class="d-flex" role="search" method = "GET" action = "<?php echo $user_page_directory;?>search.php">
                                <div class="input-group">              
                                  <input type="text" aria-label="find_name" class="form-control w-25" id="find_name" name = "find_name" placeholder="Restaurant">
                                  <input type="text" aria-label="find_location" class="form-control w-50" id="find_location" name = "find_location" placeholder = "region, province, city/barangay">
                              </div>
                                  <button class="btn btn-outline-light mx-2" type="submit">Search</button>
                          </form>
                          <span>Leave it blank and press search to see everthing</span>
                        </div>
                    </div>
              </div>
              <div class="carousel-item" data-bs-interval="3500" class="carousel">
                        <div class="row text-light shadow-md text-center carousel-content d-flex justify-content-end"> 
                            <div class="col-md-4 pt-5 pb-5 my-auto">
                                <h1 class="display-4 fw-bold">Quick Reservation</h1>
                                <p>
                                    Still haven’t found that sweet spot?
                                    Use our search <br> filters to help you find your next amazing meal.
                                </p>
                            </div>
                        </div>
              </div>
              <div class="carousel-item" data-bs-interval="3500" class="carousel">
                        <div class="row text-bg-dark text-center carousel-content"> 
                            <div class="col-md-4 pt-5 pb-5 m-auto">
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <main>

        <!-- about us -->
        <section class="text-light" data-bs-theme = "dark">
             <div class="container">
                <div class="row">
                        <div class="col-12 mt-md-3 p-md-5 p-3 text-center">
                          <h1 class="display-4 fw-bold">HOP2eat</h1>
                          Looking for an ideal restaurant and book a table quickly and easily with Hop2Eat. We provide a one-of-a-kind dining experience that includes delicious meals in a peaceful and cozy place. If you're having trouble deciding where to eat, we provide the ideal setting and delicious food toshare with family and friends, a special occasion, or a romantic date.
                          <br>
                          <a href="pages/about_us.php" class="btn btn-outline-secondary mt-5">About us</a>
                        </div>

                        <div class="col-12 border my-5">
                          <div class="row border h-100">
                            <div class="col-8 border h-100 overflow-hidden p-0"> 
                              <img src="Assets/images/homepage/f1.jpg" alt="" class="w-100 h-100">
                            </div>
                          

                          <div class="col-4 border h-100">
                            <div class="row border h-100">
                              <div class="col-12 border h-50 overflow-hidden p-0">
                                <img src="Assets/images/homepage/f2.jpg" alt="" class="w-100 h-100">
                              </div>
  
                              <div class="col-12 border h-50 overflow-hidden p-0">
                                <img src="Assets/images/homepage/f3.jpg" alt="" class="w-100 h-100">
                              </div>
                            </div>
                          </div>
                      </div>  
                      </div> 
                </div>
            </div>
        </section>

        <!-- breakfats --> 
        <section class="breakfast " data-bs-theme = "dark">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=1&cuisine_location='">
                <div class="card-">
                  <img src="Assets/images/homepage/breakfast.jpg" class="image rounded">
                  <div class="intro">
                      <h3>BREAKFAST</h3>
                      <p>Are you having trouble finding your breakfast spot? Hop2eat has you covered because we have plenty of options for you.</p>
                  </div>
                 </div>
              </div>

              <div class="col-md-4 col-sm-6 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=2&cuisine_location='">
                <div class="card-">
                        <img src="Assets/images/homepage/lunch.jpg" class="image rounded">
                        <div class="intro">
                            <h3>LUNCH</h3>  
                            <p>Are you having trouble finding your lunch spot? Hop2eat has you covered because we have plenty of options for you.</p>
                        </div>
                    </div>
              </div>

              <div class="col-md-4 col-sm-6 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=3&cuisine_location='">
                <div class="card-">
                        <img src="Assets/images/homepage/dinner.jpg" class="image rounded">
                        <div class="intro">
                            <h3>DINNER</h3>
                            <p>Are you having trouble finding your dinner spot? Hop2eat has you covered because we have plenty of options for you.</p>
                        </div>
                    </div>
              </div>

            </div>
          </div>
        </section>

        <!-- reservation header -->
        <section class="bg-dark-subtle text-center container-fluid text-bg-tertiary reservation-section" data-bs-theme = "dark">
          <div class="row d-flex align-items-center">
            <div class="col-12 text-light pt-5 ">
                <h1 class = "display-4 fw-bold">HEALTHY AND TASTY</h1>
            </div>
          </div>
        </section>

        <!-- famous restaurant -->
        <section class = "restaurant" data-bs-theme = "dark">
            <div class="container-fluid">
              <div class="container p-4">
                <div class="row pt-5 ">
                  <div class="col-12">
                    <a href="#" class="btn btn-outline-primary float-end m">View All</a>
                    <h3 class="text-uppercase mb-4 p-1 border-bottom ">Famous restaurants</h3>
                  </div>
                </div> 
                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <?php for($i = 0; $i < $max_carousel; $i++)
                          {?>
                          <div class="carousel-item <?php if($i==0){echo "active";}?>">
                            <div class="row row-cols-lg-2 row-cols-md-1 g-4 ">
                            <?php for ($j = 0; $j < $restaurant_per_carousel; $j++)
                            {$row = $restaurant->fetch_assoc();?>
                            <div class="col d-block ">
                              <div class="card mb-3" style="max-height: 250px;max-width: 540px;">
                                  <div class="row flex-md-row g-0 shadow">
                                    <div class="col-md-5 overflow-hidden">
                                      <img src="<?php echo $imageRestaurantDirectory.$row['image'];?>" class="m-auto rounded-start" alt="..." height="200px">
                                    </div>
                                    <div class="col-md-7">
                                      <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name'];?></h5>
                                        <p class="card-text">
                                          <?php 
                                          $truncatedText = strlen($row['description']) > 100 ? substr($row['description'], 0, 100) . "..." : $row['description'];
                                          echo $truncatedText;?>
                                        </p>
                                        <?php for ($k = 0, $stars = 5, $currentStars = $row['rating']; $k < $stars; $k++, $currentStars--)
                                        {?>
                                          <?php
                                          if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                                          elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                                          else{echo '<i class="fa fa-star"></i>';}?> 
                                        <?php
                                        }
                                        ?>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['address']?></small></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php
                            }?>
                            </div>
                          </div>
                          <?php
                          }?>
                        </div>
                      </div>
                </div>
              </div>
        </section>

        <!-- famous dishes -->  
        <section class="pt-5 pb-5 dishes">
            <div class="container">
              <div class="row pt-5 ">
                <div class="col-12">
                  <a href="#" class="btn btn-outline-primary float-end m">View All</a>
                  <h3 class="text-uppercase mb-4 p-1 border-bottom ">Dishes from famous restaurants</h3>
                </div>
              </div> 
              <div class="row">
              <?php
                for($j = 0 ; $j < $cuisine_per_carousel; $j++)
                { $row = $cuisine->fetch_assoc();
              ?>
                <div class="col-md-4 col-sm-6 mb-3">
                  <div class="card overflow-hidden text-bg-dark shadow">
                    <img src="<?php echo $imageCuisineDirectory.$row['image'];?>" class="card-img-top" alt="Card Image" height = "200px" widht = "300x">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['cuisine_name'];?></h5>
                      <p class="card-text mb-4">From: <a href="<?php echo $https . $row['website']?>"> <?php echo $row['restaurant_name']?> </a></p>
                    </div>
                    <div class="card-footer">
                      Location: <?php echo $row['address']?>
                    </div>
                  </div>
                </div>
              <?php 
                }
              ?>
                
              </div>
            </div>
        </section>

        <!-- services -->
        <section class="services mt-3 mb-5 pb-4 text-light">
          <div class="container">
              <div class="row g-3">
                  <div class="col-12 text-center p-4">
                    <h3 class="text-uppercase mb-4 p-1 border-bottom ">Services</h3>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center p-4 rounded">
                      <img src="<?php echo $imageDefaultDirectory?>reward.png" alt="..." height = "150"><br>
                      Get free meals and discounts for birthday celebrants on selected months.
                      <br>
                      <button class="btn btn-light mt-4">Dining Rewards</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center p-4 rounded">
                      <img src="<?php echo $imageDefaultDirectory?>dine.png" alt="..." height = "150"><br>
                      Arrange your desired table set-up and foods for events.
                      <br>
                      <button class="btn btn-light mt-4">Private Dining</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center p-4 rounded" aria-hidden="true">
                      <img src="Assets/images/placeholder1.png" class="card-img-top" alt="..." height = "150">
                      <div class="card-body">
                        <h5 class="card-title placeholder-glow">
                          <span class="placeholder col-6"></span>
                        </h5>
                        <p class="card-text placeholder-glow">
                          <span class="placeholder col-7"></span>
                          <span class="placeholder col-4"></span>
                          <span class="placeholder col-4"></span>
                        </p>
                        
                      <a href="pages/service.php" class="btn btn-light mt-4">View all</a>
                      </div>
              </div>
          </div>
        </section>
    </main>
    <!-- icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Bootstrap</title>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
      </symbol>
      <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
      </symbol>
      <symbol id="instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
      </symbol>
      <symbol id="twitter" viewBox="0 0 16 16">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
      </symbol>
    </svg>
    <!-- footer -->
    <footer class="py-5 text-light custom-dark-dark-bg">
      <div class="container">
          <div class="row">
              <div class="col-6 col-md-2 mb-3">
                <h5>Facility</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0 ">Private Room</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0 ">Event Room</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0 ">Custom Room</a></li>
                </ul>
              </div>
        
              <div class="col-6 col-md-2 mb-3">
                <h5>Discover</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">Restaurant Near me</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">Restaurant For others</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">Restaurant Open Now</a></li>
                </ul>
              </div>
        
              <div class="col-6 col-md-2 mb-3">
                <h5>Support</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">About Us</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">FAQs</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">Private Policy</a></li>
                  <li class="nav-item mb-3"><a href="#" class="nav-link p-0">Help</a></li>
                </ul>
              </div>
        
              <div class="col-md-5 offset-md-1 mb-3">
                <form>
                  <h5>Subscribe to our newsletter</h5>
                  <p>Monthly digest of what's new and exciting from us.</p>
                  <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-primary" type="button">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
        
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
              <p>© 2023 Company, Inc. All rights reserved.</p>
              <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
              </ul>
            </div>
      </div>
    </footer>

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
  </body>
</html>