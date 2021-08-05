<?php 
session_start();
ob_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
	header("Location: iniciarSesion.php");
	ob_end_flush();
}
include("db.php");
if (isset($_POST['guardarNoticia'])) {
	$tituloNoticia = $_POST['titulo'];
	$descripcionNoticia = $_POST['descripcion'];
	$cuerpoNoticia = $_POST['cuerpo'];
	$tipoNoticia = $_POST['tipo'];
	$nombreFoto = $_FILES["foto"]["name"];
	$ruta = $_FILES["foto"]["tmp_name"];
	$destino = "img/".$nombreFoto;
	copy($ruta, $destino);
	$query = "INSERT INTO noticias(titulo, descripcion, cuerpo, imagen, tipo) VALUES ('$tituloNoticia','$descripcionNoticia', '$cuerpoNoticia','$destino','$tipoNoticia')";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Falló la consulta");
	}
	$_SESSION['message'] = 'Noticia guardada correctamente'; 
	$_SESSION['message_type'] = 'success';
	header("Location: panelNoticia.php");
	ob_end_flush();
}
?>