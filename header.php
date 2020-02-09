<!doctype html>
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/fs-mymodal.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bitter|Gamja+Flower|Josefin+Sans|Kalam|Nunito|Pacifico|Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aos.css" >
    <link rel="shortcut icon" href="images/icon/icon.png">
    <link rel="stylesheet" href="css/fontawesome-5.11.2/css/all.css">
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>

    <!-- Title -->
    <div class="Main">
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span style="padding-right:10px;" class="nav_icon">
        <a class="navbar-brand"  href="kustomer/index.php?m=tiket">
          <img src="images/icon/logo.png" width="120" height="30" class="d-inline-block align-top" alt="">

        </a>
      </span>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav text-right">

          <?php

          if(!isset($_SESSION['id_kustomer'])) {
            echo '<li class="nav-item active">';
            echo '<a class="nav-link" href="login.php">Masuk</a>';
            echo '</li>';
            echo '<li class="nav-item active">';
            echo '<a class="nav-link" href="registrasi.php">Registrasi</a></span>';
            echo '</li>';
          } else {
             $username = $_SESSION['id_kustomer'];
             echo '<li class="nav-item active">';
             echo '<a class="nav-link" href="logout.php">Log out</a>';
             echo '</li>';
          }
          ?>
        </ul>

      </div>
    </nav>
  </div>




  <?php

   ?>
