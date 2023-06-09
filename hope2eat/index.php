<!-- setting up php -->
<?php 
    require_once "../hope2eat/Assets/phpFunctions/dbConnect.php";
    //image directory for the not in the db images
    $imageDefaultDirectory = "Assets/images/homepage/";
    $imageRestaurantDirectory = "Assets/images/restaurantImages/";
    $max_carousel = 3; 
    
    //restaurant carousel
    $restaurant_per_carousel = 2;
    $restaurant_display = $restaurant_per_carousel * $max_carousel;

    $sql = "CALL get_restaurant();";
    $restaurant = $conn->query($sql);

    //cuisine carousel
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel="stylesheet" href="../hope2eat/Assets/css/style.css">
</head>
<body>
    
    <!-- navbar -->
    <nav class="navbar sticky-md-top navbar-expand-lg navbar-light bg-light border">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">
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
                  <li><a class="dropdown-item" href="#">Location</a></li>
                  <li><a class="dropdown-item" href="#">Cuisine</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Reservation</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
              </li>
              </ul>
              
          </div>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success me-2" type="submit">Search</button>
          </form>
    
          <div class="align-items-middle">
              <button type="button" class="btn btn-danger"><a href="" class = "nav-link">Login</a></button>
              <button type="button" class="btn btn-outline-danger"><a href="" class = "nav-link">Register</a></button>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
  </nav>
  <!-- header -->
    <header class="container-fluid p-0">
        
        <!-- carousel headeer -->
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>            
            <div class="carousel-inner">
              <div class="carousel-item active">
                    <div class="row text-light text-center h-100"> 
                        <div class="col-md-4 h-100"></div>
                        <div class="col-md-4 pt-5 pb-5 mt-5 mb-5 h-100">
                            <h1>WELCOME TO HOP2eat</h1>
                            <p>
                                Still haven’t found that sweet spot?
                                Use our search filters to help you find your next amazing meal.
                            </p>
                        </div>
                        <div class="col-md-4 h-100">
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                        <div class="row text-dark text-center"> 
                            <div class="col-md-4 h-100"></div>
                            <div class="col-md-4 pt-5 pb-5 mt-5 mb-5 h-100">
                                <h1>Check out the famous cuisines</h1>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim nulla totam earum facere est fugiat, optio recusandae rerum vero ab!
                                </p>
                            </div>
                            <div class="col-md-4 h-100">
                            </div>
                        </div>
              </div>
              <div class="carousel-item">
                        <div class="row text-bg-dark text-center"> 
                            <div class="col-md-4 h-100"></div>
                            <div class="col-md-4 pt-5 pb-5 mt-5 mb-5 h-100">
                                <h1>Quick Reservation</h1>
                                <p>
                                    Still haven’t found that sweet spot?
                                    Use our search filters to help you find your next amazing meal.
                                </p>
                            </div>
                            <div class="col-md-4 h-100">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- about us -->
        <section class="text-bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>aboutImg1.jpg" alt="" class="rounded img-thumbnail">
                    </div>
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-4">HOP2eat</h1>
                        Looking for an ideal restaurant and book a table quickly and easily with Hop2Eat. We provide a one-of-a-kind dining experience that includes delicious meals in a peaceful and cozy place. If you're having trouble deciding where to eat, we provide the ideal setting and delicious food toshare with family and friends, a special occasion, or a romantic date.
                        <br>
                        <a href="" class="btn btn-outline-secondary mt-5">About us</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- famous restaurant -->
        <section class = restaurant>
            <div class="container-fluid text-bg-dark">

              <div class="container p-4">
                    <h2 class = "text-center display-4 ">Famous restaurants </h2>
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-outline-info align-self-end">View all</a>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <?php for($i = 0; $i < $max_carousel; $i++)
                          {?>
                          <div class="carousel-item <?php if($i==0){echo "active";}?>">
                            <div class="row row-cols-lg-2 row-cols-md-1 g-4">
                            <?php for ($j = 0; $j < $restaurant_per_carousel; $j++)
                            {$row = $restaurant->fetch_assoc();?>
                            <div class="col d-block">
                              <div class="card mb-3" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-5 overflow-hidden">
                                      <img src="<?php echo $imageRestaurantDirectory.$row['image'];?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                      <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name'];?></h5>
                                        <p class="card-text">
                                          <?php 
                                          $truncatedText = strlen($row['description']) > 100 ? substr($row['description'], 0, 100) . "..." : $$row['description'];
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
        <section class="text-bg-light pt-5 pb-5 shadow-sm dishes">
            <div class="container">
              <div class="row pt-5 ">
                <div class="col-12">
                  <a href="#" class="btn btn-outline-primary float-end m">View All</a>
                  <h3 class="text-uppercase mb-4 p-1 border-bottom ">Famous restaurants in Manila</h3>
                </div>
              </div> 
              <div class="row">
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                  <div class="card overflow-hidden">
                    <img src="https://picsum.photos/200/300" 
                    class="card-img-top" 
                    alt="Card Image"
                    height = "200px" widht = "300x">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Dōtonbori Canal</h5>
                      <p class="card-text mb-4">Is a manmade waterway dug in the early 1600's and now displays many landmark commercial locals and vivid neon signs.</p>
                      <p class="card-text mb-4"><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-full checked"></span>
                        <span class="fa fa-star"></span></p>
                      <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                    </div>
                  </div>
                </div>
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                  <div class="card overflow-hidden">
                    <img src="https://i.postimg.cc/4xVY64PV/porto-timoni-double-beach-corfu-greece-700.jpg" class="card-img-top" alt="Card Image" height = "200px" widht = "300x">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Porto Timoni Double Beach</h5>
                      <p class="card-text mb-4">Near Afionas village, on the west coast of Corfu island. The two beaches form two unique bays. The turquoise color of the sea contrasts to the high green hills surrounding it.</p>
                      <p class="card-text mb-4"><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-full checked"></span>
                        <span class="fa fa-star"></span></p>
                      <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                    </div>
                  </div>
                </div>
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                  <div class="card overflow-hidden">
                    <img src="https://i.postimg.cc/TYyLPJWk/tritons-fountain-valletta-malta-700.jpg" class="card-img-top" alt="Card Image" height = "200px" widht = "300x">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Tritons Fountain</h5>
                      <p class="card-text mb-4">Located just outside the City Gate of Valletta, Malta. It consists of three bronze Tritons holding up a large basin, balanced on a concentric base built out of concrete and clad in travertine slabs.</p>
                      <p class="card-text mb-4"><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-full checked"></span>
                        <span class="fa fa-star"></span></p>
                      <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!-- services -->
        <section class="services">
          <div class="container">
              <div class="row g-3">
                  <div class="col-12 text-center p-4">
                      <a href="" class="btn btn-outline-primary mt-3 float-end">View all</a>
                      <h1 class="display-5 border-bottom">Services</h1>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center border rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>reward.png" alt="..." height = "150"><br>
                      Get free meals and discounts for birthday celebrants on selected months.
                      <br>
                      <button class="btn btn-dark mt-4">Dining Rewards</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center border rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>dine.png" alt="..." height = "150"><br>
                      Arrange your desired table set-up and foods for events.
                      <br>
                      <button class="btn btn-dark mt-4">Private Dining</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center border rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>treats.png" alt="..." height = "150"><br>
                      Made to make your holidays more special.
                      <br>
                      <button class="btn btn-dark mt-4">Holiday Treats</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center border rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>sched.png" alt="..." height = "150"><br>
                      See reserved days and choose yours with us.
                      <br>
                      <button class="btn btn-dark mt-4">Schedule Table</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center border rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>pay.png" alt="..." height = "150"><br>
                      Payment transaction is flexible with different payment method.
                      <br>
                      <button class="btn btn-dark mt-4">Payment</button>
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
    <footer class="py-5 text-bg-dark">
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
  
  </body>
</html>