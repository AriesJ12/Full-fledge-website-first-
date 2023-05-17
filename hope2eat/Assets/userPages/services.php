<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Services</title>
	<link rel="stylesheet" href="../css/services-view.css">

    <!-- FOR FOOTER ICONS -->
    <script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- Header -->
    <?php require_once "parts/navbar.html"?>
    

        <!-- Header BG -->
        <main>
            <section class="home" id="home">
                <div class="home-content">
                    <img src="../images/images-cuisine/cover.jpg" alt="" class="home-img">
                        <div class="home-details">
                            <div class="home-text">
                               <p class="homeTitle">SERVICES</p>   
                            </div> 
                        </div>
                </div>
            </section>

    <!-- SERVICES SECTION -->
        <section class="services">
            <div class="services-container">
                    <div class="view2">
                        <a href="services.php" class="btn">view all</a>
                    </div>

                    <div class="servi-container"> 
                        <div class="box-service">  
                            <div class="service-img">
                                <img src="../images/reward.png">
                            </div>  
                                <p>Get free meals and discounts for birthday celebrants on selected months.</p>
                                <a href="diningrew.php" class="btn">Dining Rewards</a>
                        </div> 

                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="../images/dine.png">
                            </div>  
                                <p>Arrange your desired table set-up and foods for events.</p>
                                <a href="privatedining.php" class="btn">Private Dining</a>
                        </div>
                            
                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="../images/treats.png">
                            </div>   
                                <p>Made to make your holidays more special.</p>
                                <a href="treats.php" class="btn">Holiday Treats</a>
                        </div>
                           
                        <div class="box-service">
                            <div class="service-img">
                                <img src="../images/sched.png">
                            </div>  
                                <p>See reserved days and choose yours with us.</p>
                                <a href="sched.php" class="btn">Schedule Table</a>
                        </div>
                            
                        <div class="box-service"> 
                            <div class="service-img">
                                <img src="../images/pay.png">
                            </div>  
                                <p>Payment transaction is flexible with different payment method.</p>
                                <a href="payment.php" class="btn">Payment</a>
                        </div>
                    </div>
            </div>
        </section>

        <!-- FOOTER --> 
        <?php require_once "parts/footer.html"?> 

       

</body>
</html>