<?php include("db.php") ?>
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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <!--buscador-->
      <form action="busqueda.php" method="GET">
        <div class="input-group rounded">
          <input type="search" name="busqueda" class="form-control rounded" placeholder="Buscar noticia" aria-label="Search"
            aria-describedby="search-addon" />
          <input type="submit" value="buscar">
        </div>
      </form>
      <!--finbuscador-->
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
  <!--Fin navigation-->
  <!-- Page Header -->
  <?php  
    $query = "SELECT * FROM  noticias ORDER BY idNoticia DESC LIMIT 1";
    $result_items = mysqli_query($conn, $query) or die ( "Algo ha ido mal en la consulta a la base de datos");
  ?>
  <header class="masthead" style="background-image: url('img/backgroundimage.jpeg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
      <?php  while($row = mysqli_fetch_array($result_items)) { ?>
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <?php echo '<h1>'.$row['titulo'].'</h1>'?>
            <?php echo '<p>'.$row['descripcion'].'</p>'?>
            <a href="post.php?id=<?php echo $row['idNoticia']?>" class="btn btn-primary">Ver nota completa</a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </header>
  <!--fin header-->
    <!-- Contenido principal --> 
    <section id="tabla">
      <?php require("mainContentPager.php");?>
    </section>
  </div>
  <hr>
  <!-- Footer -->
  <?php require('footer.php')?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/pager.js"></script>
</body>
</html>