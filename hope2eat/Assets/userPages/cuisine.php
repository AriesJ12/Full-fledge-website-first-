<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cuisine</title>
	<link rel="stylesheet" href="../css/cuisine.css">

    <!-- FOR ICONS -->
    <script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>

</head>
<body>
   <!-- Header -->
<?php require_once "parts/navbar.html"?>

        <!-- Header BG -->
        <main>
            <section class="home" id="home">
                <div class="home-content">
                    <img src="../images/cuisine.png" alt="" class="home-img">
                    <!--
                    <div class="home-details">
                        <div class="home-text">
                           <p class="homeTitle">CUISINE</p>   
                        </div> 
                    </div> -->
                </div>
            </section>

 <!-- TODAY'S DISHES -->
        <section class="dish" id="resto">
            <div class="dish-container">
                <h1 class="heading">TODAY'S DISHES</h1> 
                    <div class="view1">
                        <a href="todaydish.php" class="btn">view all</a>
                    </div>

                    <div class="dishes-container"> 

                        <div class="box-dish">  
                            <div class="dish-img">
                                <img src="../images/images-cuisine/herb.png">
                            </div>
                                
                            <h3>Herb Roasted Chicken </h3><br>
                            <a href="https://www.facebook.com/liamsnlouisgourmetcafe/" class="link">    <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i>  Liam & Louis’ Gourmet Café</h4>
                            </a>
                                
                        </div> 

                        <div class="box-dish">
                            <div class="dish-img">
                                <img src="../images/images-cuisine/pasta.png">
                            </div>  
                            
                            <h3>Lemon Pepper Cajun Chicken Fettuccine Alfredo </h3>
                            <a href="https://www.facebook.com/ilustradorestaurant/" class="link">
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Cafe Ilang Ilang</h4>
                            </a>        
                        </div> 

                        <div class="box-dish">  
                            <div class="dish-img">
                                <img src="../images/images-cuisine/pizza.jpg">
                            </div>
                            
                            <h3>5 Cheese Pizza </h3><br>
                            <a href="https://www.facebook.com/people/Grumpy-Joe-Pampanga/100083036991702/" class="link">
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Grumpy Joe</h4>
                            </a>
                        </div>  
                </div>
            </div>
        </section>    

        <!-- FAMOUS DISHES -->
        <section class="dish" id="resto">
            <div class="famous-container">
                <h1 class="heading">FAMOUS DISHES</h1> 
                    <div class="view2">
                        <a href="famousdish.php" class="btn">view all</a>
                    </div>

                    <div class="famousdish-container"> 
                        <div class="box-famous">  
                            <div class="famous1-img">
                                <img src="../images/images-cuisine/herb.png">
                            </div>
                            <div class="info">
                                <p>Herb Roasted Chicken </p><br>
                                <a href="https://www.facebook.com/liamsnlouisgourmetcafe/" class="link">    
                                <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i>  Liam & Louis’ Gourmet Café</h4>
                                </a>
                            </div>    
                                    
                        </div> 

                        <div class="box-famous">
                            <div class="famous-img">
                                <img src="../images/images-cuisine/pasta.png">
                            </div>  
                            <div class="info">
                                <p>Lemon Pepper Cajun Chicken Fettuccine Alfredo </p><br>
                                <a href="https://www.facebook.com/ilustradorestaurant/" class="link">
                                    <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Cafe Ilang Ilang</h4>
                                </a>
                            </div>            
                        </div> 

                        <div class="box-famous">  
                            <div class="famous2-img">
                                <img src="../images/images-cuisine/pizza1.jpg">
                            </div>
                            <div class="info">
                                <p>5 Cheese Pizza </p><br><br>
                                <a href="https://www.facebook.com/people/Grumpy-Joe-Pampanga/100083036991702/" class="link">
                                    <h4><i class="fa-solid fa-location-dot" style="color: #ff0505;"></i> Grumpy Joe</h4>
                                </a>
                            </div>    
                        </div>  
                    </div>    
                </div>
            </div>
        </section>    

    <!-- NAVMEAL -->
        <section class="navmeal">
            <div class="meal-container">
                <nav class="navi">
                    <ul>
                        <li><a href="korean.php" class="nav-link">KOREAN FOOD</a></li>
                        <li><a href="japanese.php" class="nav-link">JAPANESE FOOD</a></li>
                        <li><a href="pizza.php" class="nav-link">PIZZA</a></li>
                        <li><a href="burger.php" class="nav-link">BURGER</a></li>
                        <li><a href="pasta.php" class="nav-link">PASTA</a></li> 
                    </ul>
                </nav>
            </div>
        </section>

    <!-- BRUNCH DISHES -->
        <section class="brunch">
                <div class="container">
                    <div class="card">
                        <img src="../images/images-cuisine/breakfast.jpg" class="image">
                        <div class="intro">
                            <h3>BREAKFAST</h3>
                            <p>Are you having trouble finding your breakfast spot? Hop2eat has you covered because we have plenty of options for you. view more</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="../images/images-cuisine/lunch.jpg" class="image">
                        <div class="intro">
                            <h3>LUNCH</h3>
                            
                        </div>
                    </div>

                    <div class="card">
                        <img src="../images/images-cuisine/dinner.jpg" class="image">
                        <div class="intro">
                            <h3>DINNER</h3>
                            
                        </div>
                    </div>
                </div>
        </section>

    <!-- FOOTER --> 
    <?php require_once "parts/footer.html"?> 
   
<!-- FOR ICONS -->
<script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>

</body>
</html>