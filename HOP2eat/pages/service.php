<?php $imageDefaultDirectory="../Assets/images/homepage/"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body class="service custom-dark-dark-bg" data-bs-theme="dark">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    <!-- header -->

  <header>
    <div class="container header-height d-flex align-items-center justify-content-center">
        <h1 class="display-1 text-light pt-3">Services</h1>
    </div>
  </header>

    <main>
    <section class="services mb-5">
          <div class="container pt-5">
              <div class="row g-3">
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center  rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>reward.png" alt="..." height = "150"><br>
                      Get free meals and discounts for birthday celebrants on selected months.
                      <br>
                      <button class="btn btn-light mt-4">Dining Rewards</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center  rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>dine.png" alt="..." height = "150"><br>
                      Arrange your desired table set-up and foods for events.
                      <br>
                      <button class="btn btn-light mt-4">Private Dining</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center  rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>treats.png" alt="..." height = "150"><br>
                      Made to make your holidays more special.
                      <br>
                      <button class="btn btn-light mt-4">Holiday Treats</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center  rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>sched.png" alt="..." height = "150"><br>
                      See reserved days and choose yours with us.
                      <br>
                      <button class="btn btn-light mt-4">Schedule Table</button>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 text-center  rounded p-4">
                      <img src="<?php echo $imageDefaultDirectory?>pay.png" alt="..." height = "150"><br>
                      Payment transaction is flexible with different payment method.
                      <br>
                      <button class="btn btn-light mt-4" type = "button" onclick = "window.location.href='payment.php'">Payment</button>
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