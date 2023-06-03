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
    <title>Profile</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body data-bs-theme = "dark">
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
        $id = $_SESSION['id'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //update in database

                //get data
                $first_name =  $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];

                //create statement
                $sql = "UPDATE account SET first_name = '$first_name', last_name = '$last_name',email = '$email' WHERE id = $id";
                $result = $conn->query($sql);

                //update session
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['email'] = $email;
        }
    ?>
    <!-- main part -->
    <main class = "container mt-5 mb-5 p-4">
        <section class="Profile">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-4 col-12 navbar text-md-center">
                    <div class="container d-block">
                        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
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
                                    <a class="nav-link active" aria-current="page" href="#">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Review History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- display info and ask for changes -->
                <form class="col-md-8 col-12" method = "POST" action = "">
                    <h1>Account Information: </h1>
                    <div class="row">
                        <div class="col-6 my-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value = "<?php echo $_SESSION['first_name'];?>">
                        </div>
                        <div class="col-6 my-3">
                            <label for="last_name">Last Name</label>
                            <input type="text"class="form-control" name="last_name" id="last_name" value = "<?php echo $_SESSION['last_name'];?>">
                        </div>
                        <div class="col-12 my-3">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value = "<?php echo $_SESSION['email'];?>">
                        </div>
                        <button class="btn btn-primary mt-5" type = "button" data-bs-toggle="modal" data-bs-target="#confirmModal">Update Information</button>
                    </div>
                    <!-- modal confirm-->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updateModalLabel">Confirm Update?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

</body>
</html>