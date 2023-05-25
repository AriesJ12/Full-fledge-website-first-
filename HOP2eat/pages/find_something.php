<?php
  $imageDefaultDirectory = "../Assets/images/restaurantImages/";
  $max_resto = 3;
  
  require_once "../Assets/phpFunctions/dbConnect.php";

  $sql = "CALL get_restaurant_filter('', 'manila');";

  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find something</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body>
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    <!-- header -->
    <header>
      <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Try using the search bar at the navbar to see better result</h1>
          <span class="text-muted">Press search without any inputs to show everything</span> 
        </div>
      </div>
      </section>
    </header>
    <!-- main part -->
    <main class = "container">
        <!-- famous restaurant in random places -->  
        <section class="text-bg-light pt-5 pb-5 shadow-sm random-place">
            <div class="container">
              <div class="row pt-5 ">
                <div class="col-12">
                  <!-- view all button -->
                  <a href="search.php?find_name=&find_location=Manila" class="btn btn-outline-primary float-end m">View All</a>
                  <h3 class="text-uppercase mb-4 p-1 border-bottom ">Famous restaurants in Manila</h3>
                </div>
              </div> 
              <div class="row">
                <?php
                  for($i = 0; $i < $max_resto; $i++)
                  { $row = $result->fetch_assoc();
                    if(is_null($row)) //checks if the row is null, break if it is
                    {
                      break;
                    }
                  ?>
                  <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card overflow-hidden">
                      <img src="<?php echo $imageDefaultDirectory.$row['image']?>" 
                      class="card-img-top" 
                      alt="Card Image"
                      height = "200px" widht = "300x">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row['name']?></h5>
                        <p class="card-text mb-4 text-muted"><?php echo $row['address'] ?></p>
                        <p class="card-text mb-4"><?php echo $row['description'] ?></p>
                        <p class="card-text mb-4">
                        <?php for ($k = 0, $stars = 5, $currentStars = $row['rating']; $k < $stars; $k++, $currentStars--)
                        {?>
                          <?php
                          if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                          elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                          else{echo '<i class="fa fa-star"></i>';}?> 
                        <?php
                        } echo $row['rating'];
                        ?>
                        </p>
                        <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                      </div>
                    </div>
                  </div>
                <?php
                  }
                ?>
                
              </div>
            </div>
        </section>

        <!-- 

        to do change content nearby restaurants
        ETO LANG PAPALITAN MO, ung kasing iba is merong back end
         -->
        <!-- nearby restaurants  -->  
        <section class="text-bg-light pt-5 pb-5 shadow-sm dishes">
            <div class="container">
              <div class="row pt-5 ">
                <div class="col-12">
                  <a href="#" class="btn btn-outline-primary float-end m">View All</a>
                  <h3 class="text-uppercase mb-4 p-1 border-bottom ">Ang gagawin ni kriesha</h3>
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

        <!-- best diner place -->  
        <section class="text-bg-light pt-5 pb-5 shadow-sm random-place">
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

        <!-- bestt breakfast place -->  
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


    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>