<?php 
session_start();
ob_start();
include("db.php");
	$usuario = $_SESSION['usuario'];
	if (!isset($usuario)) {
	header("Location: iniciarSesion.php");
	ob_end_flush();
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
                        <form action="saveUser.php" method="post" onSubmit="return validacionInicioSesionYusuario()">
                            <h3>Nuevo Usuario</h3>
                            <input id="userForm" name="userForm" type="text" placeholder="Escriba usuario">
                            <br><br>
                            <input id="passForm" name="passForm" type="password" placeholder="Escriba password">
                            <br><br>
                            <div class="form-group">
                                <select name='tipo' required>
                                    <option value="">Seleccionar tipo</option>
                                    <option value="admin">admin</option>
                                    <option value="editor">editor</option>
                                </select>
                             </div>
                            <button class="btn btn-success btn-block" name="cargarUsuario">
							    Cargar
						    </button>
                        </form>
                        <!--Volver-->
		                <a href="panelNoticia.php">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="validaciones.js"></script>