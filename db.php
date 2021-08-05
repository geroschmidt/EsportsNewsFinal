<?php 
	$conn = mysqli_connect(
		'localhost', //host
		'root', //user
		'', //pass
		'enews' //db 
	);
	if(!$conn){
		die("Conexion fallida: " . mysqli_connect_error());
	}
?>
