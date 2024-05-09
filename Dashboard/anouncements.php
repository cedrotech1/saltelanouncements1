<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
  include ("header.php");
  include ("asidemenu.php");

  ?>




  <main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">add anouncements form</h5>
              <form class="row g-3" method='post' action="" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="title" name='title'>
                    <label for="floatingName">title</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="description" name='description'>
                    <label for="floatingName">description</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" id="floatingName" placeholder="image" name='image'>
                    <label for="floatingName">image</label>
                  </div>
                </div>


                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" name='cid' aria-label="State">
                    <?php
                    include ("connection.php");

                    $result = mysqli_query($connection, "select * from category");
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                      </tr>
                      <?php

                    }
                    ?>

                  </select>
                  <label for="floatingSelect">category</label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">list of categories</h5>
              <table class='table'>
                <tr>
                  <td>title</td><td>description</td><td>category</td>
                </tr>
                <?php
                include ("connection.php");

                $result = mysqli_query($connection, "SELECT announcements.title,description,image,category.title FROM announcements,category WHERE announcements.cid=category.id");
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td><?php echo $row['0']; ?></td>
                    <td><?php echo $row['1']; ?></td>
                    <td><?php echo $row['3']; ?></td>
                  </tr>
                  <?php

                }
                ?>

              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php
include ("connection.php");
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $cid = $_POST['cid'];
  $image = $_FILES['image']['name'];
  $temp_image = $_FILES['image']['tmp_name'];

  // check if product exist
  $sql = "select * from announcements where title='$title'";
  $result = mysqli_query($connection, $sql);
  $rows = mysqli_num_rows($result);
  if ($rows > 0) {
         echo "<script/>alert('announcement exist ')</script>";

  } else {
          // Move uploaded image to upload folder
          $upload_directory = "upload/";

          move_uploaded_file($temp_image, $upload_directory . $image);
          $sql = "INSERT INTO announcements  VALUES (null,'$title', '$description', '$upload_directory$image','$cid')";

          if ($connection->query($sql) === TRUE) {
              echo "New record created successfully";
              echo "<script/>window.location.href='anouncements.php'</script>";
          } else {
              echo "Error: " . $sql . "<br>";
          }
  }



}


?>