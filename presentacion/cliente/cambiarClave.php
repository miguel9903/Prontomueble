<?php
include "presentacion/validacionCliente.php";
include 'presentacion/menuCliente.php';

if (isset($_GET['idcliente'])) {
    $cliente = new Cliente($_GET['idcliente']);
    $cliente->consultar();
}

$error = 0;

if (isset($_POST['editar'])) {
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Bogota");
    $fecha_actualizacion = date("Y-m-d");
    $clave_actual = $_POST['clave_actual'];
    $clave_nueva = $_POST['clave_nueva'];
    $clave_nueva_confirmacion = $_POST['confirmacion_clave_nueva'];
    
    $clienteClave = new Cliente($cliente->getId(), "", "", "", $clave_nueva, "", $fecha_actualizacion);
    $clienteClave->consultar();
   
    if ($clave_nueva != $clave_nueva_confirmacion) {
        $error = 1;
    }else{
        if (md5($clave_actual) != $clienteClave->getClave()) {
            $error = 2;
        }else{
            $clienteClave->actualizarClave();
        }
    }
}
?>

<div class="container mt-3">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">	
			<div class="card ">
				<div class="card-header bg-info text-white">Cambiar clave</div>
				<div class="card-body">
			
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/cliente/cambiarClave.php") ?>">
						<div class="form-group">
							<label>Clave actual</label> 
							<input name="clave_actual" type="password" class="form-control" placeholder="Digite clave actual" required>
						</div>
						<div class="form-group">
							<label>Nueva clave</label> 
							<input name="clave_nueva" type="password" class="form-control" placeholder="Digite clave nueva" required>
						</div>
						<div class="form-group">
							<label>Confirmar clave</label> 
							<input name="confirmacion_clave_nueva" type="password" class="form-control" placeholder="Digite clave nueva" required>
						</div>
						
						<?php 
						if (isset($_POST['editar'])) {			
	                       if ($error==1) {
	                    ?>
	                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
 						    Las claves no coinciden
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
	                    <?php 
	                       } else if($error==2){
	                    ?>
	                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
 						    La clave actual no es correcta
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
	                    <?php 
	                       }else if($error==0){
	                    ?>
	                    <div class="alert alert-success alert-dismissible fade show" role="alert">
 						    Clave modificada con exito
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
	                    <?php 
					    }
					   }
						?>
						<button type="submit" name="editar" class="btn btn-outline-info btn-block">Guardar cambios</button>		
					</form>
	
				</div>
			</div>
	 	</div>
  		<div class="col-3"></div>
	</div>
</div>