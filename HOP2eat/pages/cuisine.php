<?php
  require_once "../Assets/phpFunctions/dbConnect.php";
  $imageCuisineDirectory = "../Assets/images/cuisineImages/";
  $https = "https://";

  // Cuisine carousel
  $cuisine_per_carousel = 3;

  $sql = "CALL get_cuisine();";
    if ($conn->multi_query($sql)) {
        $cuisine = $conn->store_result(); // Get the restaurant result set
    
        $conn->next_result(); // Move to the next result set
    
        
    
        // $sql = "CALL get_cuisine();";
        // if ($conn->multi_query($sql)) {
        //     $cuisine = $conn->store_result(); // Get the cuisine result set
        // }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuisines</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
  </head>
  <body class="cuisine custom-dark-dark-bg" >
  <!-- navbar -->
  <?php require_once "../Assets/navbar-footer/navbar.php"?>
  <!-- header -->
  <header>
    <section class=" text-center container pb-1">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="text-light fs-3">Try our newly added cuisine search engine</h1>
          <span class="text-light">Press search without any inputs to show everything</span> 
         <p>
         <form role="search" method = "GET" action = "<?php echo $user_page_directory;?>search_cuisine.php">
            <div class = "form-floating">
              <input type="text" aria-label="find_cuisine" class="form-control border border-warning my-3" id="find_cuisine" name = "find_cuisine" placeholder="Cuisine">
              <label for="find_cuisine">Cuisine</label>
            </div>
            <div class="form-floating">
              <select class="form-select border border-warning my-3" id="classification" name = "classification">
                <option value = "" selected>Any ...</option>
                <option value="1">Breakfast</option>
                <option value="2">Lunch</option>
                <option value="3">Dinner</option>
              </select>
              <label for="classification">Meal time</label>
            </div>
  
            <div class="form-floating">
              <input type="text" name="cuisine_location" id="cuisine_location" class="form-control border border-warning my-3" placeholder = "region, province, barangay/city">
              <label for="cuisine_location">Location</label>
            </div>
            <button class="btn btn-dark me-2 my-3" type="submit">Search</button>
          </form>   
          </p>
        </div>
      </div>
    </section>
  </header>
  
  <main data-bs-theme = "dark">
    <div class="album">
      <!-- famous dishes -->  
      <section class="text-light pt-5 pb-5 dishes">
              <div class="container">
                <div class="row pt-5 ">
                  <div class="col-12">
                    <h3 class="text-uppercase mb-4 p-1 border-bottom ">Dishes from famous restaurants</h3>
                  </div>
                </div> 
                <div class="row">
                <?php
                  for($j = 0 ; $j < $cuisine_per_carousel; $j++)
                  { $row = $cuisine->fetch_assoc();
                ?>
                  <div class="col-md-4 col-sm-6 mb-3 ">
                    <div class="card overflow-hidden shadow text-bg-dark">
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
    </div>

  </main>
    
  <?php require_once "../Assets/navbar-footer/footer.html"?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
