<!-- category template-->
<?php //require + variable declaration
    require_once "../phpFunctions/dbConnect.php";
    $headerImage;
    $id;
    $sql;
    $result;
?>

<?php //sql data get
    if(isset($_GET['location']))
    {
        //get the $_get variable
        $id = $_GET['location'];

        //prepare sql statement;
        //get the header image
        $column = "headerImage"; 
        $table = "location";
        $condition = "id = $id"; 
        $sql = "SELECT $column FROM $table where $condition;"; 
        //execute the sql
        $result = $conn->query($sql);
        //gets header
        $headerImage = $result->fetch_assoc();
        $headerImage = $headerImage['headerImage'];

        //get the restaurant data
        $column = "restaurants.name AS restaurant_name, restaurants.imageURL AS restaurant_image, restaurants.rating AS rating, ".
        "CONCAT(location.city, ', ',location.region_or_state,', ',location.country) AS location, restaurants.website AS website";
        $table = "restaurants";
        $firstInner = "location ON restaurants.locationID = location.id";
        $condition = "locationID = $id";
        $sql = "SELECT $column FROM $table ".
        "INNER JOIN $firstInner ".
        "where $condition;";
        //execute the query
        $result = $conn->query($sql);
    }
    if(isset($_GET['cuisine']))
    {
        //get the $_get variable
        $id = $_GET['cuisine'];

        //prepare sql
        //gets header
        $column = "headerImage";
        $table = "cuisines";
        $condition = "id = $id";
        $sql = "SELECT $column FROM $table WHERE $condition;";
        $result = $conn->query($sql);
        $headerImage = $result->fetch_assoc();//header fetch

        $headerImage = $headerImage['headerImage'];

        //gets the restaurants data
        $column = "restaurants.name AS restaurant_name, restaurants.imageURL AS restaurant_image, restaurants.rating AS rating, ".
        "CONCAT(location.city, ', ',location.region_or_state,', ',location.country) AS location, restaurants.website AS website";
        $table = "restaurants";
        $firstInner = "restaurant_cuisine ON restaurants.id = restaurant_cuisine.restaurantID";//to get the cuisines
        $secondInner = "location ON restaurants.locationID = location.id"; // to get the location
        $condition = "restaurant_cuisine.cuisineId = $id";
        $sql = "SELECT $column FROM $table ".
        "INNER JOIN $firstInner " .
        "INNER JOIN $secondInner ".
        "WHERE $condition;";
        
        //execute query"
        $result = $conn->query($sql);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <!-- display the header -->
    <header>
        <img src="<?php echo $headerImage?>" alt="Header image">
    </header>

    <!-- display the restaurant , use $result php variable + while in order to diplay the restaurants-->
    <section>
        <!-- main box(first div) put class if ever -->
        <?php
        while($row = $result->fetch_assoc())
        {
            $image = $row['restaurant_image'];
            $restaurantName = $row['restaurant_name'];
            $rating = $row['rating'];
            $location = $row['location'];
            $website = $row['website'];
            ?>
        <div onclick = > 
            <!-- show the image -->
            <div class="image">
                <img src="<?php echo $image?>" alt="restaurant image">
            </div>
            <!-- show the details -->
            <div class="details">
                <span><?php echo $restaurantName?></span>
                <br>
                <span><?php echo $rating?></span>
                <br>
                <span><?php echo $location?></span>
            </div>
        </div>
        <?php
        }?>
    </section>
    <?php $conn->close();?>
</body>
</html>