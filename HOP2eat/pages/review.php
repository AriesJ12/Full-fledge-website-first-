<?php
    $restoImageDirectory = "../Assets/images/restaurantImages/";
    $accountImageDirectory = "../Assets/images/userImages/";
    $cuisineImageDirectory = "../Assets/images/cuisineImages/";
    require_once "../Assets/phpFunctions/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="../Assets/css/style.css?v=2"/>
</head>
<body class = "custom-dark-dark-bg" data-bs-theme = "dark">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>

    <?php //record comment
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Set up data
            $restoId = $_GET['resto_id'];
            $accountId = $_SESSION['id'];
            $rating = $_POST['rating'];
            $comment = $_POST['description'];
        
            // Escape the variables to prevent SQL injection (optional, but recommended)
            $restoId = mysqli_real_escape_string($conn, $restoId);
            $accountId = mysqli_real_escape_string($conn, $accountId);
            $rating = mysqli_real_escape_string($conn, $rating);
            $comment = mysqli_real_escape_string($conn, $comment);
        
            // Execute the SQL statement
            $sql = "CALL add_rating($restoId, $accountId, $rating, '$comment')";
            $result = $conn->query($sql);
        
            if ($result) {

            } else {
                // Handle the case when the query execution fails
                echo "Error executing the query: " . $conn->error;
            }
        
            // Close the connection
            $conn->next_result();
        }
        
    ?>

    <!-- main part -->
    <main class = "container mt-5 mb-5">
        <!-- display -->
    <?php

        //get restaurant    
        $id = $_GET['resto_id'];
        $sql = "CALL get_restaurant_by_id($id);";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <!-- display restaurant -->
    <section>
            <div class="row p-3 m-3 border rounded">
                <div class="col-lg-3 mt-3">
                    <img src="<?php echo $restoImageDirectory . $row['image']?>" alt="Preview Image" id = "main_picture" class="rounded img-fluid">
                </div>
                <div class="col-lg-9 mt-md-3">  
                    <h2 id = "main_title"><?php echo $row['name']?></h2>
                    <?php for ($k = 0, $stars = 5, $currentStars = $row['rating']; $k < $stars; $k++, $currentStars--)
                    {?>
                        <?php
                        if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                        elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                        else{echo '<i class="fa fa-star"></i>';}
                        ?> 
                    <?php
                    }
                    ?>
                    <br>
                    <span class = text-secondary id = "main_address"><?php echo $row['address']?></span>
                    <br><br>
                    <span id = "main_description"><?php echo $row['description']?></span>
                    <br>
                </div>
            </div>
        </section>
        <!-- comment below -->
        <section class = "row">
            <div class="col-8 m-auto">
                <!-- post -->
                <form action="" method="post" class = "d-block">

                    <h1 class = "text-center">Write your comment</h1>
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>                    
                    <br><br>
                    <!-- newly added cuisine no backend-->
                    <textarea class = "form-control" name="description" id="description" cols="50" rows="5" placeholder= "Comment " class = "form-control"></textarea>
                    <br>
                    <input type="submit" name = "add" value="Post" class = "btn btn-warning align-self-end">
                </form>
        <!-- display reviews -->
                <h1 class = "text-center">Reviews</h1>
                <div class="row">
                
                    <?php
                        // get reviews
                        $result->free();
                        $conn->next_result();
                        $sql = "CALL display_rating(NULL, $id);";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                    ?>
                    <hr class = "my-5">
                        <div class="col-sm-4 col-12">
                            <?php
                                if(is_null($row['profileImage']))
                                {
                                    $profileImage = "defaultAvatar.jpg";
        
                                }
                                else
                                {
                                    $profileImage = $row['profileImage'];
                                }
                            ?>
                            <img src="<?php echo $accountImageDirectory . $profileImage?>" alt="" class = "rounded" height = "50px">
                            <?php echo "{$row['first_name']} {$row['last_name']}";?>
                            <br>
                            <span class="text-muted">
                                <?php echo $row['rating_date']?>
                            </span>
                            <br>
                            <?php for ($k = 0, $stars = 5, $currentStars = $row['rating_value']; $k < $stars; $k++, $currentStars--)
                            {?>
                                <?php
                                if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                                elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                                else{echo '<i class="fa fa-star"></i>';}
                                ?> 
                            <?php
                            }
                            ?>
                            
                        </div>
                        <div class = "col-sm-8 col-12 border rounded p-3">
                            <?php echo $row['comment']?>
                        </div>
                    <?php
                        } $result->free(); $conn->next_result();
                    ?>
                </div>
            </div>
        </section>
   
    </main>



    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <!-- <script src = "../../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>