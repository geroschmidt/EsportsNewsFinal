<?php include("db.php")?>
<?php 
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: panelNoticia.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <?php require('meta_link.php')?>  
    </head> 
    <body>
        <div class="container p-4">
		    <div class="row">
			    <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="login.php" method="post" onSubmit="return validacionInicioSesionYusuario()">
                            <h3>Iniciar Sesion</h3>
                            <input id="userForm" name="userForm" type="text" placeholder="Escriba su usuario">
                            <br><br>
                            <input id="passForm" name="passForm" type="password" placeholder="Escriba su password">
                            <br><br>
                            <input type="checkbox" id="recordar" name="recordar" type="recordar">
                            <label>Recordar</label>
                            <button class="btn btn-success btn-block" name="Ingresar">
							    Ingresar
						    </button>
                            <!--cookie-->
                            <?php if(isset($_COOKIE['idUser'])){?>
                                <?php 
                                    $consulta = "SELECT * FROM usuarios WHERE idUser='".$_COOKIE['idUser']."'";
	                                $resultado = mysqli_query( $conn, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	                                //Bucle while que recorre cada registro
	                                while ($columna = mysqli_fetch_array( $resultado ))
	                                {
                                        $usuario = $columna['user'];
                                        $pw = $columna['pass'];
                                    }?>
                                    <script>
                                        document.getElementById("userForm").value = "<?= $usuario ?>";
                                        document.getElementById("passForm").value = "<?= $pw ?>";
                                        document.getElementById("recordar").checked= true;
                                    </script>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="validaciones.js"></script>