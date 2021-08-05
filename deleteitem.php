<?php
	session_start();
	ob_start();
	include("db.php");
	$usuario = $_SESSION['usuario'];
	if (!isset($usuario)) {
		header("Location: iniciarSesion.php");
		ob_end_flush();
	}
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query="SELECT * FROM noticias WHERE idNoticia = $id";
		$result = mysqli_query($conn,$query);
		$rutadb = mysqli_fetch_array($result);
		unlink($rutadb["imagen"]);
		$query = "DELETE FROM noticias WHERE idNoticia = $id";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Error al eliminar la noticia");	
		}
		$_SESSION['message'] = 'Noticia eliminada correctamente';
		$_SESSION['message_type'] = 'danger';
		header("Location: panelNoticia.php");
		ob_end_flush();
	}
?>
