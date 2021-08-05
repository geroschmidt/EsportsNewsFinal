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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Volver al inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = "SELECT * FROM noticias WHERE idNoticia = $id";
      $result_item = mysqli_query($conn, $query);
 
      if (mysqli_num_rows($result_item) == 1) {
        $row =  mysqli_fetch_array($result_item); 
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        $cuerpo = $row['cuerpo'];
        $imagen = $row['imagen'];
      }
    }
  ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?= $row['imagen']?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
      <?php  { ?>
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
           <?php echo '<h1>'.$titulo.'</h1>'?>
           <?php echo '<p>'.$descripcion.'</p>'?>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </header>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
      <?php  { ?>
        <div class="col-lg-8 col-md-10 mx-auto">
         <?php echo '<p>'.$cuerpo.'</p>'?>
        </div>
        <?php } ?>
      </div>
    </div>
  </article>
  <hr>
  <!-- Footer -->
  <?php require('footer.php')?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
</body>
</html>
