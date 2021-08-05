<?php 
    session_start();
    ob_start();
 	include("db.php");
	require('meta_link.php');
	#valido la sesion
	$usuario = $_SESSION['usuario'];
	if (!isset($usuario)) {
	 header("Location: iniciarSesion.php");
	 ob_end_flush();
 	}
 	if (isset($_GET['id'])) {//si existe traigo los elementos para completarlos en el form
 		$id = $_GET['id'];
 		$query = "SELECT * FROM noticias WHERE idNoticia = $id";
 		$result_item = mysqli_query($conn, $query);
 		if (mysqli_num_rows($result_item) == 1) {
 			$row =  mysqli_fetch_array($result_item); 
 			$titulo = $row['titulo'];
 			$descripcion = $row['descripcion'];
 			$cuerpo = $row['cuerpo'];
 			$tipo = $row['tipo'];
			$img = $row['imagen'];
 		}
 	}
 	if (isset($_POST['update'])) {#si existe guardo los elementos del form en variables
 		$id = $_GET['id'];
 		$titulo = $_POST['titulo'];
 		$descripcion = $_POST['descripcion'];
 		$cuerpo = $_POST['cuerpo'];
        $tipo = $_POST['tipo'];
 		$imagen = $_FILES["foto"]["name"];
 		if ($imagen == "") {//la img no se cambio hago update sin img
 			$query = "UPDATE noticias SET titulo = '$titulo', descripcion = '$descripcion', cuerpo = '$cuerpo', tipo = '$tipo' WHERE idNoticia = $id";
 			mysqli_query($conn, $query);
 			$_SESSION['message'] = "Noticia modificada correctamente";
 			$_SESSION['message_type'] = 'info';
 		}else {//update completo
			unlink($img);
 			$nombreFoto = $_FILES["foto"]["name"];
			$ruta = $_FILES["foto"]["tmp_name"];
			$destino = "img/".$nombreFoto;
			copy($ruta, $destino);
			$query = "UPDATE noticias SET titulo = '$titulo', descripcion = '$descripcion', cuerpo = '$cuerpo', imagen = '$destino', tipo = '$tipo' WHERE idNoticia = $id";
 			mysqli_query($conn, $query);
 			$_SESSION['message'] = "Noticia modificada correctamente";
 			$_SESSION['message_type'] = 'info';
 		}
		header("Location: panelNoticia.php"); 
		ob_end_flush();
 	}
 ?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="card card-body">
					<form action="edititem.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data"  onSubmit="return validacionEditNoticia()">
						<h3>Modificar noticia</h6>
						<div class="form-group">
							<label>Titulo</label>
							<input id="titulo" type="text" name="titulo" value="<?php echo $titulo; ?> " class="form-control" >
						</div>
						</br>
						<div class="form-group">
							<label>Descripcion</label>
							<input id="descripcion" type="text" name="descripcion" value="<?php echo $descripcion; ?> " class="form-control" placeholder="Nueva descripcion">
						</div>
						</br>
						<div class="form-group">
							<label>Cuerpo</label>
							<textarea id="cuerpo" name="cuerpo" rows="2" class="form-control" placeholder="Nuevo cuerpo"><?php echo $cuerpo; ?></textarea>
						</div>
						</br>
						<label>Imagen</label>
						<div class="form-group">
							<td id="imagen"><?php echo '<img src="'.$row["imagen"].'" width="150" heigth="150">' ?></td>
							<input type="file" name="foto" id="foto" class="form-control">
							<input type="hidden" name="fotosubida" value="<?=$row["imagen"]?>">
							<h6>*Si modifica la imagen no la verá actualizada hasta que guarde los cambios.</h6>
						</div>
						<div class="form-group">
							<label>Tipo:</label><?php echo $tipo; ?>
							</br>
                             <select name='tipo' required>
								<option value="" selected disable hidden>Cambiar tipo</option>
                                <option value="csgo">csgo</option>
                                <option value="lol">lol</option>
                                <option value="fortnite">fortnite</option>
                            </select>
                        </div>
						</br>
						<button class="btn btn-success btn-block" name="update">Actualizar</button>
					</form>
				</div>
			</div>	
		</div>
	</div>
<script src="validaciones.js"></script>