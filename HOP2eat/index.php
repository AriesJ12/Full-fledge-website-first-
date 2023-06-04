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
            <div class="col-lg-4 col-md-6 col-12 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=1&cuisine_location='">
              <div class="card-">
                <img src="Assets/images/homepage/breakfast.jpg" class="image rounded">
                <div class="intro">
                    <h3>BREAKFAST</h3>
                    <p>Are you having trouble finding your breakfast spot? Hop2eat has you covered because we have plenty of options for you.</p>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=2&cuisine_location='">
              <div class="card-">
                      <img src="Assets/images/homepage/lunch.jpg" class="image rounded">
                      <div class="intro">
                          <h3>LUNCH</h3>  
                          <p>Are you having trouble finding your lunch spot? Hop2eat has you covered because we have plenty of options for you.</p>
                      </div>
                  </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3 m-auto" onclick = "window.location.href='pages/search_cuisine.php?find_cuisine=&classification=3&cuisine_location='">
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
                            <div class="card mb-3" style="max-height: 500px;max-width: 540px;">
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
                <a href="pages/search_cuisine.php?find_cuisine=&classification=&cuisine_location=" class="btn btn-outline-primary float-end m">View All</a>
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
    <?php require_once "Assets/navbar-footer/footer.html"?>

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
  </body>
</html>