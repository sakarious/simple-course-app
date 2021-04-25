<?php
    require_once('config.php');
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title><?php echo "Simple Course App - ".$pageTitle; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <!-- <link href="<?php // echo ROOT_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Simple Course App</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="<?php echo ROOT_URL; ?>">Home</a>
        <?php if(isset($_SESSION['isLoggedIn'])) : ?>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>dashboard.php">Courses</a>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>reset.php">Reset Password</a>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>logout.php">Logout</a>
        <?php else : ?>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>login.php">Login</a>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>register.php">Register</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

