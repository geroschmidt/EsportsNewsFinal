<?php include_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('meta_link.php')?>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">E-Sports News</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="csgo.php">CSGO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fornite.php">FORTNITE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lol.php">LOL</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/backgroundimage.jpeg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Resultados de busqueda</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
    <!-- Main Content -->
    <!--Busqueda paginada-->
    <section id="tabla">
      <?php require('pagerBusqueda.php')?>
    </section>
</body>
</html>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/pager.js"></script>