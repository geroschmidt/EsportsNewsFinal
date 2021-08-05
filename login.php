<?php include("db.php")?>
<?php
    $usuario_correcto=null;
    $pwDB=null;
    $tipo=null;
    $idUser=null;
	//establecer y realizar consulta. guardar en variable.
	$consulta = "SELECT * FROM usuarios WHERE user='" . $_POST['userForm'] . "'";
	$resultado = mysqli_query( $conn, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	//Bucle while que recorre cada registro
	while ($columna = mysqli_fetch_array( $resultado ))
	{
        $usuario_correcto = $columna['user'];
        $pwDB = $columna['pass'];
        $tipo=$columna['tipo'];
        $idUser=$columna['idUser'];
    }
    #cookie
    if(isset($_POST['recordar'])){
        setcookie("idUser",$idUser,time() + 86400); 
    }
    else{
        setcookie("idUser",$idUser,time() - 86400);
    }
    #guardo pw que viene del form
    $pass= $_POST['passForm'];
    #la encripto para compararla con la de la db
    $passSHA1= sha1($pass);
	// cerrar conexión de base de datos
	mysqli_close($conn);
    #comprobar y crear sesion:
    if ($usuario_correcto == $_POST['userForm'] && ($passSHA1 == $pwDB || $pass == $pwDB)) {
        session_start();
        $_SESSION["usuario"] = $usuario_correcto;
        $_SESSION['tipo'] = $tipo;
        header("Location: panelNoticia.php");
    } 
    else{
        echo ('El usuario o la contraseña son incorrectos');
        echo '<a href="iniciarSesion.php">Volver</a>';
    } 
?>
