<?php
    function displayError($error) {
      header("Location: register.php?error=" . urlencode($error));
      exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      require_once "../Assets/phpFunctions/dbConnect.php";
  
      $username = $_POST["username"];
      $password = $_POST["password"];
      $confirm_password = $_POST["confirm_password"];
      $email = $_POST["email"];
      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];
  
      // Check if passwords match
      if ($password !== $confirm_password) {
          // Passwords do not match, handle the error
          // ...
          displayError("Confirm Password does not match the password");
      } else {
          // Passwords match, proceed with inserting into the database
  
          // Prepare the SQL statement with placeholders
          $sql = "INSERT INTO account(username, password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?)";
  
          // Prepare the statement
          $stmt = $conn->prepare($sql);
          
          // Bind the parameters
          $stmt->bind_param("sssss", $username, $password, $email, $first_name, $last_name);
          
          try {
            
          // Execute the statement
            $stmt->execute();
          } catch (\Throwable $th) {
            
            displayError("Username already exist");
          }
          
          // Check if the execution was successful
          if ($stmt->affected_rows > 0) {
              // Record inserted successfully
              // ...
              echo '<script>'
                    .    'document.addEventListener("DOMContentLoaded", function() {'
                    .        'var toast = new bootstrap.Toast(document.getElementById("liveToast"));'
                    .       'toast.show();'
                    .    '});'
                    .'</script>';
          } else {
              // Failed to insert the record
              // ...
              
          }
          
          // Close the statement
          $stmt->close();
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body class = "bg-secondary-color register-login-bg">

    
<main class="container">
  <div class=" row my-5">
    <div class="col-lg-4 m-auto border shadow-lg p-3 mb-5 rounded text-center bg-light">
      <form action= "" method = "POST" class = "needs-validation" novalidate>
        <a href="../index.php">
          <img class="mb-4" src="../Assets/images/homepage/logoblack4.png" alt="" width="120" height="57">
        </a>
        <h1 class="h4 mb-3 fw-normal">Sign Up</h1>
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
        <div class="form-floating mb-3">
          <input type="text" id ="username" name= "username"class="form-control" required>
          <label for="username" class = "form-label">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input aria-label = "passwordHelpBlock" type="password" class="form-control" id="password" name = "password" required>
          <label for="password" class = "form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="confirm_password" name = "confirm_password" required>
          <label for="confirm_password" class = "form-label">Confirm Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" id ="email" name= "email"class="form-control" required>
          <label for="email" class = "form-label">Email</label>
        </div>
        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" id = "first_name" name = "first_name" aria-label="First Name" class="form-control" required>
            <label for="first_name" class = "form-label">First Name</label>
          </div>
          <div class="form-floating">
            <input type="text" id = "last_name" name = "last_name" aria-label="Last Name" class="form-control" required>
            <label for="last_name" class = "form-label">Last Name</label>
          </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        
      </form>
      <div class="text-center text-lg-start mt-4 pt-2">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
          <a href="login.php"class="link-danger">
            Sign-in
          </a>
        </p>
      </div>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    </div>
  </div>
</main>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">You have successfully registered</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      You can now sign-in
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
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
