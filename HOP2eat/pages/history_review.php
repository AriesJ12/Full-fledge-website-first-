<?php
//picture
    $userImageDirectory = "../Assets/images/userImages/";
    $profileImage;
//connect database
    require_once "../Assets/phpFunctions/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body class = "custom-dark-dark-bg" data-bs-theme = "dark">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    
    <?php //set necessary data
        // get picture
        if(is_null($_SESSION['profile_image']))
        {
            $profileImage = "defaultAvatar.jpg";
        }
        else
        {
            $profileImage = $_SESSION['profile_image'];
        }
        //get id
        $id = $_SESSION['id'];
        
        //prepare statement
        $sql = "CALL display_rating($id, NULL);";
        
        //execute query
        $result = $conn->query($sql);
    
    ?>
    <!-- main part -->
    <main class = "container mt-5 mb-5 p-4">
        <section class="Profile">
            <div class="row g-5 d-flex">
                <!-- sidebar -->
                <div class="col-md-4 col-12 navbar text-md-center shadow rounded align-items-start">
                    <div class="container d-block">
                        <button class="navbar-toggler d-md-none p-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        Click to see options
                        </button>
                        <div class="offcanvas-md offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Options</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <img src="<?php echo $userImageDirectory . $profileImage?>" alt="..." class = "rounded-circle" height = "100px" widht= "100px">
                                    <br>
                                    Username: <?php echo $_SESSION['username'];?>
                                    <br>
                                    ID: <?php echo $id?>  
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Review History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- display person's comments-->
                <div class="col-md-8 col-12">
                    <h1>Comment/s' History</h1>
                    <div class="row g-4">
                        <?php
                        while($row = $result->fetch_assoc())
                        {?>
                            <div class="col-12 p-3 border border-dark-subtle shadow rounded bg-dark">
                                <span class="float-end m-2">
                                    <?php for ($k = 0, $stars = 5, $currentStars = $row['rating_value']; $k < $stars; $k++, $currentStars--)
                                    {?>
                                    <?php
                                    if($currentStars > 0 and $currentStars < 1){echo '<i class="fa fa-star-half-full checked"></i>';}
                                    elseif($currentStars > 0){echo '<i class="fa fa-star checked"></i>';}
                                    else{echo '<i class="fa fa-star"></i>';}?> 
                                    <?php
                                    } echo $row['rating_value'];
                                    ?>
                                </span>
                                <h3 class = "text-info"><?php echo $row['restaurant_name']?></h3>
                                <p class="text-muted"><?php echo $row['rating_date']?></p>
                                <blockquote>
                                    <?php echo $row['comment']?>
                                </blockquote>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

</body>
</html>