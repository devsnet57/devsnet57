<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ecommerce Ben</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Stepper CSS -->
    <link href="css/addons-pro/steppers.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Stepper CSS - minified-->
  <!-- <link href="css/addons-pro/steppers.min.css" rel="stylesheet"> -->

  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css'> -->
</head>
<body style="margin: 0; padding: 0;">
  <!-- Horizontal Steppers -->
    <!-- Start your project here-->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar white">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible wrapper -->
        <div  class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <?php if (authorize(array('director'))): ?>
          <a class="navbar-brand mt-2 mt-lg-0 font-weight-bold" href="dashboard.php"> Ecommerce Ben </a>
          <?php endif;?>

          <?php if (!authorize(array('director'))): ?>
          <a class="navbar-brand mt-2 mt-lg-0 font-weight-bold" href="forum.php"> Ecommerce Ben </a>
          <?php endif;?>
          <!-- Left links -->
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <?php if (authorize(array('director'))): ?>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
          <?php endif;?>

            <?php if (!isset($_SESSION['user'])): ?>
            <li class="nav-item">
              <a
                  class='btn btn-info btn-rounded btn-sm font-weight-bold'
                  href="sign-up.php"
                  data-offset='90'
                  >Sign Up
                </a>

            </li>
            <li class="nav-item">
            <a
                  class='btn btn-info btn-rounded btn-sm font-weight-bold'
                  href="login.php"
                  data-offset='90'
                  >Login
                </a>

            </li>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="deals.php">Deals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php">Form</a>
            </li>
            <li class="nav-item">
              <a
                  class='btn btn-info btn-rounded btn-sm font-weight-bold'
                  href="logout.php"
                  data-offset='90'
                  >Logout
                </a>

            </li>

            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>



