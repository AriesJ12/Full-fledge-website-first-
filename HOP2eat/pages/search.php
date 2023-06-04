<?php
    //get directories
    $imageDefaultDirectory = "../Assets/images/developer/";
    $restaurantImages = "../Assets/images/restaurantImages/";
    $https = "https://";

    if (isset($_GET['find_location'])) {
        //get sql connection
        require_once "../Assets/phpFunctions/dbConnect.php";

        // Prepare the SQL statement to fetch user data
        $sql = "CALL get_restaurant_filter(?,?);";
    
        // Prepare the statement
        $stmt = $conn->prepare($sql);   
    
        // Bind the parameters
        $name = $_GET['find_name'];
        $location = $_GET['find_location'];
        $stmt->bind_param("ss", $name, $location);
        // Execute the statement
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../Assets/css/style.css?v=100"/>
</head>
<body class = "search text-light custom-dark-dark-bg " data-bs-theme= "dark">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    <!-- header -->
    <header>
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <p class="text-light fs-3">Check out the results below</p>
            <span class="text-light">Press search without any inputs to show everything</span> 

            <form class="d-flex pt-3" role="search" method = "GET" action = "<?php echo $user_page_directory;?>search.php">
                <div class="input-group">              
                    <input type="text" aria-label="find_name" class="form-control w-25 bg-light" id="find_name" name = "find_name" placeholder="Restaurant">
                    <input type="text" aria-label="find_location" class="form-control w-50 bg-light text-dark" id="find_location" name = "find_location" placeholder = "region, province, city/barangay">
                </div>
                        <button class="btn btn-outline-light mx-2" type="submit">Search</button>
            </form>

          </div>
        </div>
      </section>
    </header>
   
    <!-- main part -->
    <main class = "container mt-5 mb-5  ">
        <!-- search part -->
    <section class="search-restaurant">
        <div class="container p-4">
            <div class = "ms-3 text-muted">
                Trying to find a cuisine instead? Try <a href="cuisine.php">this page</a>
            </div>
            <h1 class = "border-bottom p-2">
            <?php
            // Check if a row is returned
                if ($result->num_rows >= 1) {
                    echo "Result/s for \"$name \" + \" $location\" ";
                } else {
                    // didnt find anything
                    echo "Sorry we didn't find anything :(";
                }
            ?>
            </h1>
            
            <?php // get the data
                $number = 1;
                while($row = $result->fetch_assoc())
                {
                ?>
                <div class="row p-3 my-3 border rounded bg-dark shadow">
                    <div class="col-md-3 mt-3 h-100">
                        <img src="<?php echo $restaurantImages . $row['image'];?>" alt="" class="rounded img-fluid">
                    </div>
                    <div class="col-md-6 mt-md-3 h-100">  
                        <h2 onclick = "window.location.href='<?php echo $https . $row['website']?>'"><?php echo $number.". ". $row['name']?></h2>
                        <?php for ($k = 0, $stars = 5, $currentStars = $row['rating']; $k < $stars; $k++, $currentStars--)
                        {
                            if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                            elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                            else{echo '<i class="fa fa-star"></i>';}?> 
                        <?php
                        } echo " (".$row['rating'].")"
                        ?>
                        <br>
                        <span class = text-secondary><?php echo $row['address']?></span>
                        <br><br>
                        <?php 
                            $truncatedText = strlen($row['description']) > 200 ? substr($row['description'], 0, 200) . "..." : $row['description'];
                            echo $truncatedText;
                        ?>                     
                    </div>
                    <div class="col-md-3">
                        <a href="review.php?resto_id=<?php echo $row['id']?>" class="btn btn-outline-warning ">See reviews</a>  
                        <?php 
                        if(isset($_SESSION['account_type']))
                        {
                            if($_SESSION['account_type'] == 1)
                            {?>
                            <div class="mb-3 d-flex align-items-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>   
                                </div>
                            </div>

                    <?php   }
                        }
                    ?>
                    </div>
                </div>
                <?php
                $number++;
                }
            ?>
        </div>
    </section>
    
    <!-- pagination -->
    <section>
        <nav class = "d-flex align-items-center"aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
            <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
            <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
        </nav>
    </section>
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <!-- close the connection -->
    <?php
        
        // Close the statement
        $stmt->close();
    
        // Close the database connection
        $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

</body>
</html>