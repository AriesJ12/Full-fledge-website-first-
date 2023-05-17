<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
 
    <!-- CSS -->
    <link rel="stylesheet" href="Assets/css/style.css">

    <!-- FOR ICONS -->
    <script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>

</head>
<body>
   <!-- Header -->
          <header class="navbar">
            <a href="index.php" class="logo">
                <img src="Assets/images/logo(black).png" alt="logo">
            </a> 
                <ul>
                    <li><a href="#">Discover <i class="fa-solid fa-caret-down"></i> </a> 
                        <div class="dropdown"> 
                            <ul>
                                <li><a href="Assets/userPages/discover.php">Restaurants</a></li>
                                <li><a href="Assets/userPages/cuisine.php">Cuisine</a></li>
                                <li><a href="Assets/userPages/location.php">Location</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="Assets/userPages/reservation.php" class="nav-link">Reservation</a></li> 
                    <li><a href="Assets/userPages/services.php" class="nav-link">Services</a></li>
                    <li><a href="Assets/userPages/review.php" class="nav-link">Review</a></li> 
                    <li><a href="Assets/userPages/about.php" class="nav-link">About us</a></li>
                </ul>
                    <li>
                        <a href="#" class="about-link flex">
                            <button class="buttons">Login</button>
                        </a>
                    </li>
        </header>
    
    <!-- Home Section -->
        <main>
            <section class="home" id="home">
                <div class="home-content">
                    <img src="Assets/images/bg.png" alt="" class="home-img">

                        <div class="home-details">
                            <div class="home-text">
                                <h1>Welcome to HOP2Eat</h1>
                                <p class="homeSubtitle">Still haven’t found that sweet spot?<br> Use our search filters to help you find your next amazing meal.</p>    
                            </div>
                            
                            <div class="searchbar">
                                <input type="text" placeholder="Search">
                                <a href="#">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                                </a>
                            </div>    
                        </div>
                </div>
            </section>


    <!-- About Section -->
            <section class="section about">
                <div class="about-content container">
                    <div class="about-imageContent">
                        <img src="Assets/images/aboutImg1.jpg" alt="" class="about-img">
                    </div>
                            
                    <div class="about-details">
                        <div class="about-text">
                            <h2 class="content-title">HOP2Eat</h2>
                                <p class="content-description">Looking for an ideal restaurant and book a table quickly and easily with Hop2Eat. We provide a one-of-a-kind dining experience that includes delicious meals in a peaceful and cozy place. If you're having trouble deciding where to eat, we provide the ideal setting and delicious food toshare with family and friends, a special occasion, or a romantic date.</p>

                        <div class="about-buttons flex">                                     
                            <a href="Assets/userPages/about.php" class="about-link flex">
                                <button class="button">About Us</button>  
                            </a>
                        </div>   
                    </div>
                </div>
            </section> 

     <!-- BG SECTION -->
            <section class="bg">
                <div class="bg-content">
                    <img src="Assets/images/sectionbg.png" alt="" class="bg-img">
                        <div class="bg-details">
                            <div class="section-text">
                                <h1>A QUICK RESERVATION</h1>  
                            </div>   
                        </div>
                </div>
            </section>        


    <!-- FAMOUS RESTO -->
        <section class="resto" id="resto">
            <div class="resto-container">
                <h1 class="heading">FAMOUS RESTAURANTS</h1> 
                    <div class="view">
                        <a href="Assets/userPages/discover.php" class="btn">view all</a>
                    </div>

                    <div class="restor-container"> 
                        <div class="box-resto">  
                            <div class="resto-img">
                                <img src="Assets/images/grumpyjoe.png">
                            </div>
                           
                            <a href="https://www.facebook.com/people/Grumpy-Joe-Pampanga/100083036991702/" class="link">
                                <h3>Grumpy Joe</h3>
                                <br>
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i>  Pampanga</h4>
                            </a>
                        </div> 

                        <div class="box-resto">
                            <div class="resto-img">
                                <img src="Assets/images/ilustrado.jpg">
                            </div>  
                            
                            <a href="https://www.facebook.com/ilustradorestaurant/" class="link">
                                <h3>Ilustrado Restaurants</h3>
                                <br>
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i>  Intramuros</h4>
                            </a>
                        </div> 

                        <div class="box-resto">  
                            <div class="resto-img">
                                <img src="Assets/images/harbor.jpg">
                            </div>
                            
                            <a href="https://www.facebook.com/HARBORVIEWCAPEMAY/" class="link">
                                <h3>Harbor View Restaurant</h3>
                                <br>
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Manila Bay</h4>
                            </a>   
                        </div>  
                </div>
            </div>
        </section>


     <!-- FAMOUS DISHES -->
     <section class="famous">
        <div>
         <h1 class="famous-heading">FAMOUS DISHES</h1>
            <div class="view2">
                <a href="Assets/userPages/cuisine.php" class="btn">view all</a>
            </div>
                <div class="container">
                    <div class="card">
                        <img src="Assets/images/images-cuisine/herb.png" class="famous-image">
                        <div class="intro">
                            <h3>Herb Roasted Chicken </h3>
                             <p>There’s nothing better than the aroma of a tender, juicy chicken roasting in the oven – and the anticipation of enjoying a delicious family dinner.</p>
                            <a href="https://www.facebook.com/liamsnlouisgourmetcafe/" class="link">    
                            <p class="place"><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Liam & Louis’ Gourmet Café</p>
                    </div>
                </div>

                <div class="card">
                    <img src="Assets/images/images-cuisine/pasta.png" class="famous-image">
                    <div class="intro">
                        <h3>Chicken Fettuccine Alfredo </h3>
                        <p>Chicken Fettuccine Alfredo is a type of Italian pasta dish prepared with fettuccine tossed in emulsified butter and Parmesan cheese , with flavour from cream and pan-fried chicken breast.</p>
                        <a href="https://www.facebook.com/liamsnlouisgourmetcafe/" class="link">    
                        <p class="place"><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Cafe Ilang Ilang</p>
                    </div>
                </div>

                <div class="card">
                    <img src="Assets/images/images-cuisine/pizza.jpg" class="famous-image">
                    <div class="intro">
                        <h3>5 Cheese Pizza </h3>
                        <p>This pizza is loaded with five different types of cheese, including mozzarella, cheddar, Parmesan, Asiago, and provolone.</p>
                        <a href="https://www.facebook.com/liamsnlouisgourmetcafe/" class="link">    
                        <p class="place"><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Grumpy Joe</p>
                    </div>
                </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
        <section class="services">
            <div class="services-container">
                <h1 class="heading">SERVICES</h1> 
                    <div class="view3">
                        <a href="Assets/userPages/services.php" class="btn">view all</a>
                    </div>

                    <div class="servi-container"> 
                        <div class="box-service">  
                            <div class="service-img">
                                <img src="Assets/images/reward.png">
                            </div>  
                                <p>Get free meals and discounts for birthday celebrants on selected months.</p>
                                <a href="Assets/userPages/diningrew.php" class="btn">Dining Rewards</a>
                        </div> 

                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="Assets/images/dine.png">
                            </div>  
                                <p>Arrange your desired table set-up and foods for events.</p>
                                <a href="Assets/userPages/privatedining.php" class="btn">Private Dining</a>
                        </div>
                            
                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="Assets/images/treats.png">
                            </div>   
                                <p>Made to make your holidays more special.</p>
                                <a href="Assets/userPages/treats.php" class="btn">Holiday Treats</a>
                        </div>
                           
                        <div class="box-service">
                            <div class="service-img">
                                <img src="Assets/images/sched.png">
                            </div>  
                                <p>See reserved days and choose yours with us.</p>
                                <a href="Assets/userPages/sched.php" class="btn">Schedule Table</a>
                        </div>
                            
                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="Assets/images/pay.png">
                            </div>  
                                <p>Payment transaction is flexible with different payment method.</p>
                                <a href="Assets/userPages/payment.php" class="btn">Payment</a>
                        </div>
                    </div>
            </div>
        </section>

    <!-- REVIEWS SECTION -->
        
    <!-- FOOTER --> 
        <footer class="section footer">
            <div class="footer-container container">
                <div class="footer-content">
                    <a href="#" class="logo-content flex">
                        <img src="Assets/images/logo(white).png" alt="">
                    </a>
           
                    <div class="content-description">This is the perfect place to find a nice and cozy spot. For further updates, please follow us on our social media platforms.</div>         
                </div>

                    <div class="footer-linkContent">
                        <ul class="footer-links">
                            <h4 class="footerLinks-title">Facility</h4>
                                <li><a href="#" class="footer-link">Private Room</a></li>
                                <li><a href="#" class="footer-link">Event Room</a></li>
                                <li><a href="#" class="footer-link">Custom Room</a></li>
                        </ul>
           
                        <ul class="footer-links">
                            <h4 class="footerLinks-title">Discover</h4>
                                <li><a href="#" class="footer-link">Restaurants Near Me</a></li>
                                <li><a href="#" class="footer-link">Restaurants Open Now</a></li>
                                <li><a href="#" class="footer-link">Reserve for Others</a></li>
                        </ul>
       
                        <ul class="footer-links">
                            <h4 class="footerLinks-title">Support</h4>
                                <li><a href="Assets/userPages/about.php" class="footer-link">About Us</a></li>
                                <li><a href="#" class="footer-link">FAQs</a></li>
                                <li><a href="#" class="footer-link">Private Policy</a></li>
                                <li><a href="#" class="footer-link">Help Us</a></li>

                            <div class="logo-icon">
                                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook fa-1x" style="color: #dedede;"></i></a>
                                <a href="https://twitter.com/i/flow/login"><i class="fa-brands fa-instagram fa-1x" style="color: #dedede;"></i></a>
                                <a href="https://www.instagram.com/accounts/login"><i class="fa-brands fa-twitter fa-1x" style="color: #dedede;"></i></a>
                            </div>   
                        </ul>     
                    </div>
                </div>
                            <div class="footer-copyRight">&#169; Hop2Eat. All rigths reserved</div>
        </footer>
       
</body>
</html>