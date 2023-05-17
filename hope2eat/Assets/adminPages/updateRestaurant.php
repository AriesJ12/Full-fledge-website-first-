
<?php //require + set the id
    require_once "../phpFunctions/dbConnect.php";
    define("restoId", $_GET['restaurant']);
?>
<?php //get the sql data
    //preparing the statement
    $column = "name, website, imageURL, locationID";
    $table = "restaurants";
    $condition = "id = " . restoId;
    $sql = "SELECT $column FROM $table WHERE $condition;";
    //execute and store
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $website = $row['website'];
    $image = $row['imageURL'];
    $location = $row['locationID'];

    //get cuisine
    //prepare statement
    $column = "cuisineID";
    $table = "restaurant_cuisine";
    $condition = "restaurantID = ". restoId;
    $sql = "SELECT $column FROM $table WHERE $condition;";
    
    //execute and store
    $result = $conn->query($sql);
    $current_cuisine = [];
    while($row = $result->fetch_assoc()) //get every cuisine and store them in an array
    {
        $current_cuisine[] = $row['cuisineID'];
    }
?>
<?php //update -- at the top so it uploads first before diplaying the data
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        //what to insert
        $name = $_POST['name'];
        $website = $_POST['website'];
        $location = $_POST['location'];
        $newImageName = $image;

        if(isset($_FILES['picture']))
        {
            //image
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

            }
        }

        //sql making
        $update = "name = '$name', website = '$website', ImageURL = '$newImageName', locationID = '$location'";
        $tablename = 'restaurants';
        $condition = "id = ". restoId;
        //update the restaurant
        $sql = "UPDATE $tablename SET $update WHERE $condition;";
        $result = $conn->query($sql);


        // update the cuisine
        $removeCuisine = $current_cuisine; //represent old tags or to be removed tags
        $newCuisine = $_POST['cuisine']; //represent new tags
        // Find to be removed tags and new tags
        foreach ($removeCuisine as $cuisine)
        {
            if(($removeIndex = array_search($cuisine, $removeCuisine)) && ($newIndex = array_search($cuisine, $newCuisine)))
            {
                //get the array number of the old
                //get the array number of the new

                //checks whether all the old cuisine is in the new cuisine
                //remove in the array if found(they are to be retained)
                unset($removeCuisine[$removeIndex]);
                unset($newCuisine[$newIndex]);
                
                $removeCuisine = array_values($removeCuisine);
                $newCuisine = array_values($newCuisine);
            }
        }
        //remove the to be remove in sql
        $tablename = "restaurant_cuisine";
        foreach ($removeCuisine as $cuisine)
        {
            $condition = "restaurantId = ". restoId ." AND cuisineId = $cuisine";
            $sql = "DELETE FROM $tablename WHERE $condition;";
            $result = $conn->query($sql);
        }
        //insert the to be inserted in sql
        $column = "restaurantId, cuisineId";
        foreach($newCuisine as $cuisine)
        {
            $values = restoId. ", $cuisine";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update restaurant</title>


    <!-- link stylesheet below is for the multiple select -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    
</head>
<body>
    <!-- display the information + form -->
    <form action="updateRestaurant.php?restaurant=<?php echo restoId?>" method="post" enctype="multipart/form-data">
        <img id="main_picture" src="<?php echo $image?>" alt="Main Image Preview">
        <br>
        <input type="file" id="picture" name="picture" onchange="previewImage(event)"  accept=".jpg, .jpeg, .png">
        
        <label for="name">Restaurant name</label>
        <input type="text" name="name" id="name" required value="<?php echo $name?>">
        <label for="website">Website URL</label>
        <input type="text" name="website" id="website" required value="<?php echo $website?>">
        
        <!-- newly added location no backend-->
        <label for="location">country</label>
        <select name="location" id="location" required>
            <?php
                //get available locations in the sql
                $sql = "SELECT * from location ORDER BY CONCAT(city, ' ', region_or_state, ' ', country) ASC";
                $result = $conn->query($sql);
                
                //display it as choices
                while ($row = $result->fetch_assoc())
                {
                    $id = $row['id'];
                    $country = $row['country'];
                    $region = $row['region_or_state'];
                    $city = $row['city'];
                    echo "<option value = $id "; if($id == $location){echo "selected";} ;echo ">$city, $region, $country - $id</option>";
                }
            ?>
        </select>
        <br>
        <!-- newly added cuisine no backend-->
        <label for="cuisine">Cuisine</label>
        <select name="cuisine[]" id="cuisine" multiple required>
            <?php
                //get data from sql
                $sql = "SELECT * FROM cuisines ORDER BY name";
                $result = $conn->query($sql);
                
                //display the data
                while ($row = $result->fetch_assoc())
                {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value = $id "; if(in_array($id, $current_cuisine)){echo "selected";}echo ">$name</option>";
                }
            ?>
        </select>
            
        <input type="submit" name = "add" value="Update restaurant">
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

    <!-- script below is for the multiple select input -->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('cuisine')  // id
    </script>

<?php $conn->close();?>
</body>
</html>