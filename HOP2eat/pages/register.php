<?php 
    // Start the session
    session_start();
    
    // Function to display error message and redirect
    function displayError($error) {
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the submitted username and password
        
    
        //get sql connection
        require_once "../Assets/phpFunctions/dbConnect.php";

        // Prepare the SQL statement to fetch user data
        $sql = "SELECT * FROM account WHERE username = ?";
    
        // Prepare the statement
        $stmt = $conn->prepare($sql);   
    
        // Bind the parameters
        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmt->bind_param("s", $username);
        // Execute the statement
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        // Check if a row is returned
        if ($result->num_rows === 1) {
            // Fetch the row
            $row = $result->fetch_assoc();
    
            // Verify the password
            if ($password == $row["password"]) {
                // Password is correct, store user data in session
                $_SESSION["username"] = $row["username"];
                $_SESSION["fullname"] = $row["first_name"] . " " . $row["last_name"];
                $_SESSION["profile_image"] = $row["profile_image"];
                $_SESSION["account_type"] = $row["account_type"];
    
                // Redirect to a different page
                header("Location: ../index.php");
                exit();
            } else {
                // Invalid password
                displayError("Invalid password!");
            }
        } else {
            // User not found
            displayError("User not found!");
        }
    
        // Close the statement
        $stmt->close();
    
        // Close the database connection
        $conn->close();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body class="text-center h-100 login">

    
<main class="form-signin w-100 m-auto border shadow-lg p-3 mb-5 bg-body-tertiary rounded">
  <form action= "" method = "POST">
    <a href="../index.php">
      <img class="mb-4" src="../Assets/images/homepage/logo-black3.png" alt="" width="110" height="57">
    </a>
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>
    <?php
          if(isset($_GET['error']))
          {?>
          <div class="alert alert-danger align-items-center" role="alert">
            <div class = "text-center">
              <?php echo $_GET['error'];?>
            </div>
          </div>
          <?php
          }?>
    <div class="form-floating">
      <input type="text" id ="username" name= "username"class="form-control" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name = "password" required>
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
  </form>
  <div class="text-center text-lg-start mt-4 pt-2">
    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
        class="link-danger">Register</a></p>
  </div>
  <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>
