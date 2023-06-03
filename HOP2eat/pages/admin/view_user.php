<?php
  $imagesDefaultDirectory = "../../Assets/images/userImages/";
  require_once "../../Assets/phpFunctions/dbConnect.php";
  
  $sql = "SELECT id,username, email, CONCAT(last_name, ', ', first_name), profileImage, account_type, created_at FROM account";

  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View all users</title>
  <link rel="stylesheet" href="../../Assets/css/style.css"/>
</head>
<body class = "custom-dark-dark-bg" data-bs-theme = "dark">


<main>
  <!-- navbar -->
  <?php require_once "../../Assets/navbar-footer/navbar.php"?>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">View users</h1>
      </div>
    </div>
  </section>
<!-- view users -->
  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          while($row = $result->fetch_assoc())
          {
            //get the picture then see if its null -- change it to the default image if it is
            $profileImage = $row['profileImage'];
            if(is_null($profileImage))
            {
              $profileImage = "defaultAvatar.jpg";
            }
          ?>
            <div class="col">
              <div class="card overflow-hidden rounded shadow">
                <div class="card-top">
                  <img src="<?php echo $imagesDefaultDirectory . $profileImage?>" alt="" class="img-fluid">
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title"></h5>
                  <p class="card-text">
                    Account type: 
                    <?php 
                    if($row['account_type'] == 1)
                    {
                      echo "Admin";
                    }
                    else
                    {
                      echo "User";
                    }?>
                    <br>
                    Username: <?php echo $row['username'];?>
                    <br>
                    Email: <?php echo $row['email'];?>
                  </p>
                  <div class="mb-3 d-flex align-items-end">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-info">Edit</button>
                      <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                  </div>
                  <div class="card-footer text-body-secondary">
                    Created: <?php echo $row['created_at']?>
                  </div>
                </div>
              </div>
            </div>
        
        <?php
          }
        ?>
      </div>
    </div>
  </div>

</main>

<!-- footer -->
    <?php require_once "../../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
   
      
  </body>
</html>
