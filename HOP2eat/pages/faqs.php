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
    <main class = "container text-bg-light mt-5 mb-5 p-4">
         <!-- about us -->
    <section class="faqs">
        <div class="container rounded">
            <div class="row m-5">
                <div class="col-12 p-3 text-center display-6">
                    FAQs
                </div>
            </div>
            <div class="accordion" id="faqs-content">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Is the website still on the development process?
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqs-content">
                    <div class="accordion-body">
                        <strong>Yes</strong>
                        ,some functionality of the website are still not added. Like the discount, comment, and reservation. If given time, and if invested into; we think we can fully launch the project in the internet within 6 months. 
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What is the Main purpose of your website?
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqs-content">
                    <div class="accordion-body">
                    Hope2eat is a <strong>centralize platform for all restaurant</strong>. The main purpose of our website is to help food enthusiast to find their perfect eating or dining spot anytime and anyday. 
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Is this website open source? and is it on github?
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqs-content">
                    <div class="accordion-body">
                        <strong>Yes,</strong>
                         it is open source. The link for the github repository is : https://github.com/AriesJ12/Full-fledge-website-first- . Anybody is free to fork the repo, and edit in on their own; dont forget to read alll the .md files because they are important. 
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Who are the developers?
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqs-content">
                    <div class="accordion-body">
                        Beltran, Mark John: https://github.com/Vonnn10
                        <br>
                        Buglosa, Kriesha: https://github.com/krieshaaa
                        <br>
                        David, Kian: https://github.com/kaiii07
                        <br>
                        Roldan, Willie: No github account
                        <br>
                        Tagle, Aries: https://github.com/AriesJ12 
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        What is your group number and your class?
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqs-content">
                    <div class="accordion-body">
                    We are group <strong>number 8</strong>, of BSCS 2a. In time of writing this, May 15 2023, we are batch 2022 - 2023 of Don honorio Ventura State University, College of Computing Studies, in Bachelor of Science in Computer Science 2nd year Section A. 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faqs -->
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

</body> 
</html>