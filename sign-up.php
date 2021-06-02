<?php
session_start();

require "includes/db.php";
require "includes/functions.php";

if (authenticate() && still_active()) {
    header("Location:form.php");
}

if (isset($_POST['submit_btn'])) {
    sign_up_user($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ecommerce Ben | Sign Up</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" />
    <style>
      html,
      body,
      header,
      .view {
        height: 100vh;
      }
      @media (max-width: 740px) {
        html,
        body,
        header,
        .view {
          height: 700px;
        }
      }
      @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .view {
          height: 650px;
        }
      }
    </style>
  </head>

  <body class="login-page">
    <!-- Main Navigation -->
    <header>
      <!-- Navbar -->

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
          <a class="navbar-brand mt-2 mt-lg-0 font-weight-bold" href="forum.php"> Ecommerce Ben </a>
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


      <!-- Intro Section -->
      <section
        class="view intro-2"
        style="
          background-image: url(img/background.jpg);
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center center;
        "
      >
        <div
          class="mask rgba-indigo-light h-100 d-flex justify-content-center align-items-center"
        >
          <div class="container">
            <div class="row py-5 mt-5">


              <div
                class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5"
              >
                <!-- Form with header -->
                <form action="sign-up.php" method="POST">
                <div class="card wow fadeIn" data-wow-delay="0.3s">
                  <div class="card-body">
                    <!-- Header -->
                    <div class="form-header " style="background-color: #00B3FF;">
                      <h3><i class="fas fa-user "></i> Register your account</h3>
                    </div>

                    <div class="row">

                    <div class="col-lg-12 ">
                    <?php include "includes/messages.php"?>
                      </div>

                    </div>

                    <!-- Body -->

                    <div class="md-form mb-0 mt-0">
                      <i class="fas fa-envelope prefix white-text"></i>
                      <input
                        type="text"
                        id="first_name"
                        class="form-control"
                        name="first_name"

                      />
                      <label for="first_name">First Name</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input
                        type="text"
                        id="last_name"
                        class="form-control"
                        name="last_name"

                      />
                      <label for="last_name">Last Name</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input
                        type="email"
                        id="email"
                        class="form-control"
                        name="email"

                      />
                      <label for="email">Email</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"

                      />
                      <label for="password">Password</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input
                        type="password"
                        id="confirm_password"
                        class="form-control"
                        name="confirm_password"

                      />
                      <label for="confirm_password">Confirm Password</label>
                    </div>

                          <div>

                            <label class="px-5 py-3 font-weight-bold" for="" >Role</label>
                            <div class="form-check form-check-inline">
                                  <input
                                  class="form-check-input"
                                  type="radio"
                                  name="role"
                                  id="admin"
                                  value="admin"
                                  />
                                  <label class="form-check-label" for="admin">Admin</label>
                                  </div>

                                  <div class="form-check form-check-inline">
                                  <input
                                  class="form-check-input"
                                  type="radio"
                                  name="role"
                                  id="director"
                                  value="director"
                                  />
                                  <label class="form-check-label" for="director">Director</label>
                                  </div>
                          </div>





                    <div class="text-center">
                      <button
                        type="submit"
                        name="submit_btn"
                        class="btn btn-info btn-lg"
                      >
                        Login
                      </button>

                    </div>
                  </div>
                </div>
                </form>
                <!-- Form with header -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>




    <!-- Main Content -->
    <?php include "includes/footer.php"?>