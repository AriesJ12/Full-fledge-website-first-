<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>

    <script src="https://kit.fontawesome.com/10d593c5dc.js" crossorigin="anonymous"></script>
</head>
<body class = "reservation">
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>

    <!-- header -->
    <header>
      <section class="text-center container text-bg-tertiary">
        <div class="row">

          <div class="col-12 text-center text-light pt-5 m-auto pb-5">
                <h1 class="display-3">RESERVATION</h1>

          </div>
        </div>

        <!-- Reservation -->
        <form class="container custom-dark-dark-bg rounded border p-5 w-75"  >
            <div class="row">
                <div class="col-12 text-center text-light ">
                    <h1 class="display-5">BOOK A TABLE</h1>
                </div>
            </div>
            <div class="row mt-3 g-3">
              <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Date">
                </div>

                <div class="col-md-4 ">
                  <input type="text" class="form-control" placeholder="Time">
                </div>

                <div class="col-md-4 ">
                  <input type="text" class="form-control" placeholder="No. of attendees">
                </div>
            </div>

            <div class="row mt-3 g-3">
                <div class="col-sm-6 col-12">
                  <input type="text" class="form-control" placeholder="Name">
                </div>

                <div class="col-sm-6 col-12">
                  <input type="text" class="form-control" placeholder="Contact no.">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <select class="form-select border">
                        <option value = "" selected>Select Restaurant ...</option>
                        <option value="1">La Trattoria</option>
                        <option value="2">Tacos & Tequila</option>
                        <option value="3">Italian Trattoria</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <select class="form-select border ">
                        <option value = "" selected>Select Location ...</option>
                        <option value="1">CAR, Abra, Bangued, Calaba</option>
                        <option value="2">Region VII, Bohol, Tagbilaran City, Dao</option>
                        <option value="3">Region VIII, Northern Samar, Catarman, Mabolo</option>
                    </select>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                  <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Submit</button>
        </form>
      </section>
    </header>

    </main>
    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
</body>
</html>