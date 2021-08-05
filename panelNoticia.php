<?php 
session_start();
ob_start();
include("db.php");
require('meta_link.php');
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
	header("Location: iniciarSesion.php");
	ob_end_flush();
}
?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-8 mx-auto" >
				<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert" dismiss="alert" >
						<?= $_SESSION['message'] ?> 
					</div>
				<?php } ?> 
				<div class="card card-body">
					<form action="saveItem.php" method="POST" enctype="multipart/form-data" onSubmit="return validacionNoticia()">
						<h5>Agregar nueva noticia</h6>
						<div class="form-group">
							<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo de la noticia" autofocus>
						</div>	
						<div class="form-group">
							<textarea id="descripcion" name="descripcion" rows="2" class="form-control" placeholder="Breve descripcion"></textarea>
						</div>
						<div class="form-group">
							<textarea id="cuerpo" name="cuerpo" rows="2" class="form-control" placeholder="Cuerpo de la noticia"></textarea>
						</div>
                        <div class="form-group">
                            <select name='tipo' required>
								<option value="" selected disable hidden>Seleccionar tipo</option>
                                <option value="csgo">csgo</option>
                                <option value="lol">lol</option>
                                <option value="fortnite">fortnite</option>
                            </select>
                        </div>
						<div class="form-group">
							<td>Imagen</td>
							<input type="file" name="foto" id="foto" class="form-control">
						</div>
						<input type="submit" class="btn btn-success btn-block" name="guardarNoticia" value="Guardar noticia">
					</form>
				</div>
			</div>
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<!--validamos para que solo adm pueda crear usuarios-->
					<a class="btn btn-success btn-sm" href="index.php" role="button">Ir a inicio</a>
					<?php if($_SESSION['tipo'] =='admin'){ ?>	
						<a class="btn btn-success btn-sm" href="usuarios.php" role="button">Crear usuario</a>			
					<?php }
					?>
					<a class="btn btn-danger btn-sm" href="logout.php" role="button">Cerrar sesion</a>
				</div>
			</div>
			<!--tabla de noticias-->
			<div class="col-md-12 mx-auto">
				<div class="card card-body">
					<table class="table table-bordered table-striped table-dark">
						<thead class="thead-dark table-striped">
							<tr>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th>Cuerpo</th>
								<th>Imagen</th>
								<th>Tipo</th>
								<th>Herramientas</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$query = "SELECT * FROM  noticias ORDER BY idNoticia DESC";
								$result_items = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($result_items)) { ?>
									<tr>
										<td><?php echo $row['titulo'] ?></td>
										<td><?php echo $row['descripcion'] ?></td>
										<td><?php echo $row['cuerpo'] ?></td>
										<td><?php echo '<img src="'.$row["imagen"].'" width="150" heigth="150">' ?></td>
                                        <td><?php echo $row['tipo'] ?></td>
										<td>
											<?php $titulo= $row['titulo'] ?>
											<a href="edititem.php?id=<?php echo $row['idNoticia']?>" class="btn btn-secondary" onclick="return confirm('Esta por modificar esta noticia: '+'<?php echo $titulo?>')">
												<i class="fas fa-marker"></i>
											</a>
											<?php if($_SESSION['tipo'] =='admin'){ ?>							
											<a href="deleteitem.php?id=<?php echo $row['idNoticia']?>" class="btn btn-danger" onclick="return confirm('ALERTA: Esta seguro que desea eliminar la noticia '+'<?php echo $titulo?>?')">
												<i class="far fa-trash-alt"></i>
											</a>
											<?php }
											?>
										</td>
									</tr>
							 <?php } ?>
						</tbody>
					</div>	
				</table>
			</div>
		</div>		
	</div>
<script src="validaciones.js"></script>
<script src="js/clean-blog.min.js"></script>

