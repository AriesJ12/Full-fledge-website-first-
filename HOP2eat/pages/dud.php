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
<style>
    .sample .try
    {
        border: 2px solid black;
    }
</style>
<body>
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    <!-- header -->
    break points:
    sm
    md
    lg
    
    margin:
    m
    padding:
    p
    (left/start -> s, right/end -> e, top-> t, bottom -> b)

    margin auto -> center(m-auto)

    text-center
    border

    
    <!-- main part -->
    <main class = "row mt-5 sample">
        <div class="try col-sm-6 col-md-4 text-center ">
            i am aries
        </div>
        <div class="try col-sm-6 col-md-4">
            i am aries2
        </div>

        <div class="try col-sm-6 col-md-4">
            i am aries2
        </div>
    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

</body> 
</html>