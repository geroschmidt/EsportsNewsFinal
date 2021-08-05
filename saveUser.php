<?php 
session_start();
ob_start();
include("db.php");
if (isset($_POST['cargarUsuario'])) {
	$user = $_POST['userForm'];
	$pass = $_POST['passForm'];
	$tipo = $_POST['tipo'];
    $passSHA1 = sha1($pass);
	$query = "INSERT INTO usuarios(user, pass, tipo) VALUES ('$user','$passSHA1', '$tipo')";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Falló la consulta");
	}
    header("Location: iniciarSesion.php");
	$_SESSION['message'] = 'Usuario guardado correctamente'; 
	$_SESSION['message_type'] = 'success';
	ob_end_flush();
}
?>