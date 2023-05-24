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
<body>
<section class="vh-100">    
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action = "login.php" method = "POST" class = "needs-validation" novalidate>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="username" name="username" class="form-control form-control-lg"
              placeholder="Enter your username" required>
            <label class="form-label" for="username">Username</label>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                need input!
            </div>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name = "password" class="form-control form-control-lg"
              placeholder="Enter password" required/>
            <label class="form-label" for="password">Password</label>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Need input!
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="remember" />
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>
