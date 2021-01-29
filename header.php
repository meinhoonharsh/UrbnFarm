<?php
echo '
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171634979-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "UA-171634979-1");
</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>'.$title.'</title>

  <!-- Bootstrap core CSS -->
  <link href="static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="static/css/clean-blog.min.css" rel="stylesheet">
  <style>
    .drop{font-size:12px;font-weight:800;letter-spacing:1px;text-transform:uppercase}
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img id="logo" width="40px" src="static/img/logo.png"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li><li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Post
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="drop nav-item"><a class="nav-link" href="posts.php?n=0">All Posts</a></li>
              <li class="drop nav-item"><a class="nav-link" href="category.php?playlist=basic-electronics&n=0">Basic Electronics</a></li>
              <li class="drop nav-item"><a class="nav-link" href="category.php?playlist=arduino-tutorial&n=0">Arduino Tutorial</a></li>
              <li class="drop nav-item"><a class="nav-link" href="category.php?playlist=diy&n=0">DIY</a></li>
              <li class="drop nav-item"><a class="nav-link" href="category.php?playlist=sensor-module&n=0">Sensors & Modules</a></li>
            </ul>
          </li><li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
';
?>






 