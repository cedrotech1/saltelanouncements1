<?php
// Start the session
session_start();

// Include database connection file
include ("./Dashboard/connection.php");

// Check if form is submitted
if (isset($_POST["login"])) {
  // Define email and password variables and prevent SQL injection
  $phone = mysqli_real_escape_string($connection, $_POST['phone']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  // Fetch user from database based on email
  $sql = "select names,phone,password,student.cid from student,category where student.cid=category.id and phone='$phone' and password='$password'";
 
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);

  // If user exists, verify password
  if ($count == 1) {

    // Verify hashed password retrieved from the database
   
    if ($password === $row['password']) {
      $sql = "select * from student where phone='$phone' and password='$password'";
 
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
       $cid = $row['cid'];

      }
      // echo $row['0'];

           $_SESSION['cid']= $cid;
header("Location: ./users/index.php");
exit(); //

    } else {
      $error = "Invalid password";
    }
  } else {
    $error = "phone not found";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./Dashboard/assets/img/icon1.png" rel="icon">
  <link href="./Dashboard/assets/img/icon1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./Dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./Dashboard/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">

              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>

                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post"
                    action="login.php">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">phone</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <input type="text" name="phone" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your phone.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name='login' type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">back to pages <a href="index.php">tap here to go back to pages</a></p>
                    </div>
                  </form>

                </div>
              </div>

         

            </div>
          </div>
        </div>



        <!-- Display error message if any -->
        <?php if (isset($error)) {
          echo $error;
        } ?>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>