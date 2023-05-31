<?php
    $imageDefaultDirectory = "../Assets/images/developer/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body>
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    <!-- header -->
   
    <!-- main part -->
    <main class = "container text-bg-light">
         <!-- about us -->
    <section class="about-us border-bottom">
        <div class="container">
            <div class="row p-5 m-5">
                <div class="col-12 p-md-5 p-3 text-center border-bottom">
                    <h3 class = "display-6">Who are we as a whole?</h3>
                </div>
                <div class="col-md-6 p-md-5 p-3">
                    <img src="<?php echo $imageDefaultDirectory?>aboutImg1.jpg" alt="" class="rounded img-fluid">
                </div>
                <div class="col-md-6 mt-md-3 p-md-5 p-3">
                    <h1 class="display-4">HOP2eat</h1>
                    Looking for an ideal restaurant and book a table quickly and easily with Hop2Eat. We provide a one-of-a-kind dining experience that includes delicious meals in a peaceful and cozy place. If you're having trouble deciding where to eat, we provide the ideal setting and delicious food toshare with family and friends, a special occasion, or a romantic date.
                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- as indiviaduals -->
    <section class="about-us">
        <div class="container">
            <div class="row p-5 m-5">
                <div class="col-12 p-md-5 p-3 text-center">
                    <h3 class = "display-6">Who are we as individuals?</h3>
                </div>
                <div class="row border shadow-sm rounded mb-3">
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-6">Aries Joseph</h1>
                        I am Aries Tagle, and I am the lead developer of this group. I took computer science because i like money and thinking logically xD.
                        <br>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>aries.jpg" alt="" class="rounded img-fluid img-thumbnail">
                    </div>
                </div>
                <div class="row border shadow-sm rounded mb-3">
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>willie.jpg" alt="" class="rounded img-fluid img-thumbnail">
                    </div>
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-6">Willie Roldan Jr</h1>
                        Hi Im Willie Roldan Jr Group Member Of This Group I Took Computer Science because its provide me the foundation of knowledge, problem solving, and logical thinking that will serve as a competitive advantage
                        <br>
                    </div>
                </div>
                <div class="row border shadow-sm rounded mb-3">
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-6">Kriesha Mae</h1>
                        I am Kriesha Mae Buglosa, one of the UI designers of this project. Milton Glaser once stated, "There are three responses to a piece of design - yes, no, and WOW! Wow is the one to aim for." Let's always do our best for our dreams to come true.
                        <br>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>kriesha.jpg" alt="" class="rounded img-fluid img-thumbnail">
                    </div>
                </div>
                <div class="row border shadow-sm rounded mb-3">
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>kian.jpg" alt="" class="rounded img-fluid img-thumbnail">
                    </div>
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-6">Kian</h1>
                        I am Kian David, and I'm part of the UI Designer in this group. All my life I've been in my comfort zone, I need to get out of it because a bigger world is out there waiting for me.
                        <br>
                    </div>
                </div>
                <div class="row border shadow-sm rounded mb-3">
                    <div class="col-md-6 mt-md-3 p-md-5 p-3">
                        <h1 class="display-6">Mark John</h1>
                        Hi, I'm Mark Jhon Beltran, One of the member that created this website. "Coding is like girls, hard to understand when there is a problem"
                        <br>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <img src="<?php echo $imageDefaultDirectory?>beltran.jpg" alt="" class="rounded img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>