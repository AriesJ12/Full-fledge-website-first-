<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Swiper JS CSS-->
    <link rel="stylesheet" href="Assets/css/swiper-bundle.min.css">

    <!-- Scroll Reveal -->
    <link rel="stylesheet" href="Assets/css/scrollreveal.min.js">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        
    <!-- CSS -->
    <link rel="stylesheet" href="Assets/css/style.css">
    <script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- Header -->
    <header class="header">
            <?php include "Assets/parts/navbar/introductionNavbar.html"?>
            <!-- Still needs user and admin navbar -->
    </header>

<!-- Home Section -->
    <main>
        <section class="home" id="home">
            <div class="home-content">
                <div class="swiper mySwiper">   
                <div class="swiper-wrapper">       
                    <img src="Assets/images/homeBG.png" alt="" class="home-img">
                        <div class="home-details">
                            <div class="home-text">                    
                                <h4 class="homeTitle">A QUICK RESERVATION</h4>
                                <br>
                                <h2 class="homeSubtitle">Still haven’t found that sweet spot? This is the answer you've been searching for;<br> you're a perfect user of our website. To reserve your next dinner, simply click Login.<br> If you haven't registered yet, register now.</h2>
                            </div>               
                             <div class="about-buttons flex">
                                <a href="Assets/login.php" class = "button">Login</a>
                                <span><a href="Assets/register.php" class = "button">Register</a></span>
                            </div>             
                        </div>     
                </div>                                  
                </div>                                             
            </div>
        </section>
    
<!-- Abous Us Section -->
        <section class="section about" id="about">
                <div class="about-content container">
                        <div class="about-imageContent">
                                <img src="Assets/images/aboutImg1.jpg" alt="" class="about-img">
                        </div>

                        <div class="about-details">
                                <div class="about-text">
                                        <h2 class="content-title">HOP2Eat</h2>
                                        <p class="content-description">Looking for an ideal restaurant and book a table quickly and easily with Hop2Eat. We provide a one-of-a-kind dining experience that includes delicious meals in a peaceful and cozy place. If you're having trouble deciding where to eat, we provide the ideal setting and delicious food toshare with family and friends, a special occasion, or a romantic date.</p>
                                </div>

                                <div class="about-buttons flex">
                                        <button class="button">About Us</button>
                                        <a href="#" class="about-link flex">
                                                <span class="link-text">see more</span>
                                                <i class='bx bx-right-arrow-alt about-arrowIcon'></i>
                                        </a>
                                </div>
                        </div>

                </div>
        </section>

    
<!-- Resto Section -->
        <section class="Resto" id="resto">
            <div class="heading">
                <h2>Famous Restaurants</h2>
            </div>    

                <div class="resto-container">
                    <div class="box">
                        <div class="box-img">
                            <img src="Assets/images/grumpyjoe.png">
                        </div>
                            <h2>Grumpy Joe</h2>
                            <h3>Pampanga</h3>
                    </div>
                    
                    <div class="box">
                        <div class="box-img">
                            <img src="Assets/images/ilustrado.jpg">
                        </div>
                            <h2>Ilustrado Restaurants</h2>
                            <h3>Intramuros</h3>
                    </div>
                    
                    <div class="box">
                        <div class="box-img">
                            <img src="Assets/images/harbor.jpg">
                        </div>
                            <h2>Harbor View Restaurant</h2>
                            <h3>Manila Bay</h3>
                    </div>    
                </div>
        </section>


<!-- Services Section -->
        <section class="section services" id="service">
            <div class="services-container container">
                <div class="services-text">
                    <h2 class="section-title">Services</h2>
                    <p class="service-quote">Dining rewards/coupons.
                        <br>Private dining table management & food selection/tasting. 
                        <br>Offer holiday treats.
                        <br>Payment proccesing.
                    </p>                       
                </div>
            </div>
        </section>


<!-- Reviews Section -->
        <section class="section review" id="review">
            <div class="review-container container">
                <div class="review-text">
                    <h2 class="section-title">Reviews</h2>
                    <p class="section-description">Some feedback from our customers on HOP2EAT services and their amazing experiences.</p>                       
                </div>
                        <p class="review-quote">I'm having trouble deciding where to eat with my family, but HOP2Eat comes to the rescue by recommending the perfect spot to unwind with delicious food. Thank you HOP2Eat for an amazing experience and excellent service! - ann santos</p>
            </div>
        </section>

<!-- Footer Section -->
        <footer class="section footer">
            <?php include "Assets/parts/footer.html"?>
        </footer>


<!-- Scroll Up -->
        <a href="#home" class="scrollUp-btn flex">
                <i class='bx bx-up-arrow-alt scrollUp-icon'></i>
        </a>

</main>

<!-- Swiper JS -->
<script src="Assets/js/swiper-bundle.min.js"></script>

<!-- Scroll Reveal -->
<script src="Assets/js/scrollreveal.js"></script>

<!-- JavaScript -->
    <script src="Assets/js/script.js"></script>
</body>
</html>
