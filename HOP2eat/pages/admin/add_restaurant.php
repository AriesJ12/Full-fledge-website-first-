<?php
    require_once "../../Assets/phpFunctions/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add restaurant</title>
    <link rel="stylesheet" href="../../Assets/css/style.css?v=2"/>
</head>
<body class = "custom-dark-dark-bg" data-bs-theme = "dark">
    <!-- navbar -->
    <?php require_once "../../Assets/navbar-footer/navbar.php"?>
    <!-- header -->
   <!-- header -->
   <header>
      <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Add restaurant</h1>
        </div>
      </div>
      </section>
    </header>
    <!-- main part -->
    <main class = "container mt-5 mb-5">
        <!-- display -->
    <section>
            <div class="row p-3 m-3 border rounded bg-dark">
                <div class="col-lg-3 mt-3">
                    <img src="#" alt="Preview Image" id = "main_picture" class="rounded img-fluid">
                </div>
                <div class="col-lg-9 mt-md-3">  
                    <h2 id = "main_title">Preview Title</h2>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <br>
                    <span class = text-secondary id = "main_address">Preview Address</span>
                    <br><br>
                    <span id = "main_description">Preview Description</span>
                    <br>
                </div>
            </div>
        </section>
        <!-- form below -->
        <section class = "row">
            <div class="col">
                <form action="addRestaurant.php" method="post" enctype="multipart/form-data">
                    <label for="picture">Image</label>
                    <input class ="form-control mb-3"  type="file" id="picture" name="picture" onchange="previewImage(event)"  accept=".jpg, .jpeg, .png" required>
                    
                    <label for="name">Restaurant name</label>
                    <input class ="form-control mb-3" type="text" name="name" id="name" placeholder = "Example Name" required oninput = "previewText()">
                    <label for="website">Website URL</label>
                    <input class ="form-control mb-3" type="text" name="website" id="website" placeholder = "website.com" required>
                    
                    <!-- newly added location no backend-->
                    <label for="location">country</label>
                    <select class ="form-control mb-3" name="location" id="location" required>
                        <option value="">---</option>
                    </select>
                    <br>
                    <!-- newly added cuisine no backend-->
                    <label for="description">Description</label>
                    <textarea class ="form-control mb-3"  name="descriptipn" id="description" cols="50" rows="5" oninput = "previewText()" placeholder = "minimum of 200 characters"></textarea>
                    <input type="submit" name = "add" value="Add restaurant" class = "btn btn-primary">
                </form>
            </div>   
        </section>

        
        
    
    </main>

    <!-- PERMISSION DENIED ERROR -- NEED TO MANUALLY FIX SOMETHING IN THE SERVER IN ORDER TO RUN WITHOUT ERROR -->
    <?php //upload
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {
            //what to insert
            $name = $_POST['name'];
            $website = $_POST['website'];
            $location = $_POST['location'];
            $cuisine = $_POST['cuisine'];
            $image = basename($_FILES['picture']['name']);
            $tempFolder = $_FILES['picture']['tmp_name'];
            
            //validating image
            $imgSize = $_FILES['picture']['size'];
            $validImageExtension = array("jpg", "jpeg", "png");
            $extension = explode(".",$image);
            $extension = strtolower(end($extension));
            $error = "ERROR: ";
            $notOk = FALSE;
            if (!in_array($extension, $validImageExtension)) //double checks extension
            {
                $notOk = TRUE;
                $error = "$error \n Invalid image extension"; 
            } 
            elseif ($imgSize > 1200000) // checks size
            {
                $notOk = TRUE;
                $error = "$error \n Image is too large"; 
            }
            if($notOk)//if the image is wrong
            {
                echo
                "
                <script>
                  alert('$error');
                </script>
                ";
            }
            else // if everything went well
            {
                //change the name of the image  
                $target_dir = "../images/restaurantImages"; 
                $newImageName = $name . " - " . date("Y.m.d") . " - ". date("h.i.sa") . "." . $extension;
                $newImageName = $target_dir . "/" . $newImageName;

                //move the image into the server storage
                move_uploaded_file($tempFolder, $newImageName);

                //sql making
                $column ='name, website, ImageURL, locationID';
                $tablename = 'restaurants';
                $values = "'$name', '$website', '$newImageName', '$location'";

                //upload the data into the sql
                $sql = "INSERT INTO $tablename ($column) VALUES ($values)";
                $result = $conn->query($sql);

                //get the newly inserted restaurant id
                $id = $conn->insert_id;

                //insert the cuisines in the junction table
                $tablename = "restaurant_cuisine";
                $column = "restaurantId, cuisineId";    
                foreach ($cuisine as $cuis)
                {
                    $values = "$id, $cuis";
                    $sql = "INSERT INTO $tablename ($column) VALUES ($values);";
                    $result = $conn->query($sql);
                }

                //display success
                echo
                "
                <script>
                    alert('Upload success');
                </script>
                ";
            }
        }
        $conn->close();
    ?>

    <!-- preview image for script -->
    <script src="../../Assets/js/preview.js"></script>

    <!-- footer -->
    <?php require_once "../../Assets/navbar-footer/footer.html"?>
    <!-- <script src = "../../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>