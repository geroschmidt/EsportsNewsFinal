<?php 
 include_once('db.php');
        $cant = 2; //cantidad de elementos por pagina
        $pag = (isset($_GET['p']))?$_GET['p']:1; //guardo nro de paginas que quiero cargar con el p que viene de ajax
        $ini = ($pag-1) * $cant; //indico desde donde empiezo a traer elementos
        $busqueda = (isset($_GET['busqueda']))?$_GET['busqueda']:""; //guardo el input de la busqueda
        $query ="SELECT * FROM noticias WHERE titulo LIKE '%".$busqueda."%' ORDER BY idNoticia DESC LIMIT $ini, $cant";
        $result_items = mysqli_query($conn, $query) or die ("Algo ha ido mal en la consulta a la base de datos");
?>
    <div>
        <?php 
            while($row = mysqli_fetch_array($result_items)){?>
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href="post.php?id=<?php echo $row['idNoticia']?>">
                            <?php echo '<h2 class="post-title">'.$row['titulo'].'</h2>'?>
                            <?php echo '<h3 class="post-subtitle">'.$row['descripcion'].'</h3>'?>
                        </a>
                    </div>
                </div>
            <?php 
            }
        ?>
        <?php
          $query ="SELECT count(*) cantidad FROM noticias WHERE titulo LIKE '%$busqueda%'";
          $result_items = mysqli_query($conn, $query) or die ( "Algo ha ido mal en la consulta a la base de datos");
          $result_items=mysqli_fetch_array($result_items);
          $cantidad = $result_items['cantidad']; //almaceno la cantidad de resultados encontrados
          if($cantidad==0){
            echo '<h2 class="post-title"> No se encontraron resultados.</h2>';
          }
          else{
            $paginas = $cantidad / $cant; //para saber cuantas paginas necesito para mostrar los resultados
            for($i= 1; $i<=ceil($paginas);$i++){ //se redondea $paginas 
              ?>
                <a href="javascript:busqueda(<?= $i ?>,'<?= $busqueda ?>')"><?= $i?></a> 
              <?php
            }
          }
        ?>
    </div>
  </div>