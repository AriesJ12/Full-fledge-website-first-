<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body class = "reservation">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>

    <!-- header -->
    <header>
      <section class="text-center container text-bg-tertiary">
        <div class="row">
          <div class="col-12 text-center text-light header-height pt-5 m-auto">
              <h1>BOOK A TABLE</h1>
          </div>
        </div>
      </section>
    </header>
      

    <!-- reservation -->
    <section class="reservation">
        <form class="container">
            <div class="row">
                <div class="col-md-4 pt-5 pb-5">
                  <input type="text" class="form-control" placeholder="Date">
                </div>

                <div class="col-md-4 pt-5 pb-5">
                  <input type="text" class="form-control" placeholder="Time">
                </div>

                <div class="col-md-4 pt-5 pb-5">
                  <input type="text" class="form-control" placeholder="No. of attendees">
                </div>
            </div>

            <div class="row">
                <div class="col-6 pt-2 pb-5">
                  <input type="text" class="form-control" placeholder="Name">
                </div>

                <div class="col-6 pt-2 pb-5">
                  <input type="text" class="form-control" placeholder="Contact no.">
                </div>
            </div>

            <div class="row">
                <div class="col-12 pt-2 pb-5">
                  <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                </div>
            </div>
                    <button type="submit" class="btn btn-dark mb-2">Submit</button>
        </form>


    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
</body>
</html>