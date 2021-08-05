<?php
include_once("db.php");
$cant = 5; //cantidad de elementos por pagina
$pag = (isset($_GET['p']))?$_GET['p']:1;//nro de pagina q viene de ajax
$ini = ($pag-1) * $cant;//desde donde comienza
$query = "SELECT * FROM  noticias ORDER BY idNoticia DESC LIMIT $ini, $cant";
$result_items = mysqli_query($conn, $query) or die ( "Algo ha ido mal en la consulta a la base de datos");
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
        $query = "SELECT count(*) cantidad FROM noticias"; 
        $result_items = mysqli_query($conn, $query) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $result_items=mysqli_fetch_array($result_items);
        $cantidad = $result_items['cantidad'];
        $paginas = $cantidad / $cant;//num de paginas q necesito
        for($i= 1; $i<=ceil($paginas);$i++){//redondeo
            ?>
                <a href="javascript:pagina(<?= $i ?>)"><?= $i?></a> 
            <?php
        }
    ?>
</div>