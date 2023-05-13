<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a restaurant</title>
    <style>
        input, img, textarea{
            text-align: center;
            margin: auto;
            display: block;
        }
        img{
            max-height: 60vh;
            max-width: 60vw;
        }
    </style>
</head>
<body>
    <h1>Add a restaurant</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <img id="main_picture" src="#" alt="Main Image Preview">
        <br>
        <input type="file" id="picture" name="picture" onchange="previewImage(event)"  accept=".jpg, .jpeg, .png">
        
        <label for="name">Restaurant name</label>
        <input type="text" name="name" id="name">
        <label for="website">Website URL</label>
        <input type="text" name="website" id="website">
        <input type="submit" name = "add" value="Add restaurant">
    </form>

    <!-- preview image for script -->
    <script>
        function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById("main_picture");
        var reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
        };  
        reader.readAsDataURL(input.files[0]);
        }
    </script>

    <!-- PERMISSION DENIED ERROR -- NEED TO MANUALLY FIX SOMETHING IN THE SERVER IN ORDER TO RUN WITHOUT ERROR -->
    <?php require "../phpFunctions/dbConnect.php";
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {
            //what to insert
            $name = $_POST['name'];
            $website = $_POST['website'];
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
                $column ='name, website, ImageURL';
                $tablename = 'restaurants';
                $values = "'$name', '$website', '$newImageName'";

                //upload the data into the sql
                $sql = "INSERT INTO $tablename ($column) VALUES ($values)";
                $result = $conn->query($sql);
                

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
</body>
</html>