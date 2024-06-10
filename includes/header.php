<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VolleyNr</title>
    <link href="csssko/stylesheet1.css" rel="stylesheet" >
    <link href="csssko/bootstrap.min.css" rel="stylesheet" >
    <link href="csssko/custom.scss" rel="stylesheet" >
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="csssko/css_portal.css">
    <link rel="stylesheet" href="csssko/dreji.css.map">
  </head>
  <body style="min-height: 100%;background-attachment: fixed; background-size: 100%;  background-image: linear-gradient( 180deg, #1138cc 33%, #476aec 67%) ;background-repeat: no-repeat;">
    <header>
      <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary" style="padding: 0px;">
        <div class="container-fluid" style="background-color:#6885ef;">
          <img class="logo" src="imgs/logo velke.png">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="kontakt.php">Kontakt</a>
              </li>
              <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="dashboard.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="wallet.php">Wallet</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Login.php">Login</a>
                </li>
              <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              <form class="d-flex" method="post" action="logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
  </body>
</html>