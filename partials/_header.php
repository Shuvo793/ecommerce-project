<?php /*session_start();*/?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <title><?php echo $title ?? "PPI ecommarce"; ?></title>
      <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">-->

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <link rel="icon" href="../photo/favicon/favicon.ico">
      <!--font Awesome for this template in CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  </head>

  <body style="background-color: #f8f9fa;">

  <header >
      <div class="collapse bg-dark" id="navbarHeader" >
          <div class="container">
              <div class="row">
                  <div class="col-sm-8 col-md-7 py-4">
                      <h4 class="text-white">About</h4>
                      <p class="text-muted">PPI Ecommerce Project using PHP.Text Marketing For E-Commerce and promotion are very essential for business growth no matter the industry involved. This means of text marketing is highly recommended by top players in this e-commerce industry and it has proven to help boost a lot of businesses.</p>

                          <a href="../logout.php" class="text-white" style="text-decoration: none;">
                           <?php echo isset($_SESSION['id'])? '<button class="btn btn-danger">Log Out</button>':'<button class="btn btn-info"><a href="../login.php" style="color:white;text-decoration: none;">Sign in</a></button>';?>
                          </a>
                  </div>
                  <div class="col-sm-4 offset-md-1 py-4">
                      <h4 class="text-white">Menu</h4>
                      <ul class="list-unstyled">
                          <li><a href="../category.php" class="text-white" style="text-decoration: none;">Categories</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

      <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container d-flex justify-content-between">
              <a href="../index.php" class="navbar-brand d-flex align-items-center">
                  <strong><i class="fas fa-cart-arrow-down"></i>
                      PPI Ecommerce</strong>
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                      aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
          </div>
      </div>
  </header>