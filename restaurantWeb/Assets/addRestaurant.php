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
        <input type="file" id="picture" name="picture" onchange="previewImage(event)" multiple>
        <textarea id="description" name="description" placeholder = "Description" rows=10 cols=100></textarea>
        <input type="submit" value="Add">
    </form>

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
</body>
</html>