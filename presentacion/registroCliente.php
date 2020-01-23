<?php 
include "presentacion/encabezado.php";

$error = 0;
   if (isset($_POST['registrar'])) {
       date_default_timezone_set('UTC');
       date_default_timezone_set("America/Bogota");
       $fecha_registro = date("Y-m-d");
       $cliente = new Cliente("", $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['clave'], $fecha_registro, $fecha_registro, 1);
       $administrador = new Administrador("", "", "",  $_POST['correo']);
       if ($cliente->existeCorreo() || $administrador->existeCorreo()) {
           $error = 1;   
       }else{
           $cliente->insertar();
       }
   }
?>

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-info text-white">Registro Clientes</div>
				<div class="card-body">
				
					<?php 
					   if (isset($_POST['registrar'])) {
					?>
					     <div class="alert alert-<?php echo ($error==0) ? "success": "danger";?> alert-dismissible fade show" role="alert">
					       <?php echo ($error==1) ? "El correo " . $_POST['correo'] . " ya existe" : "Registro exitoso";?>
					       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					       <span aria-hidden="true">&times;</span>
					       </button>
					     </div>
					 <?php 
					   }
					 ?>
				
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/registroCliente.php") ?>">
						<div class="form-group">
							<label>Nombre</label> 
							<input name="nombre" type="text" class="form-control" placeholder="Digite nombre" required>
						</div>
						<div class="form-group">
							<label>Apellido</label> 
							<input name="apellido" type="text" class="form-control" placeholder="Digite apellido" required>
						</div>
						<div class="form-group">
							<label>Correo</label> 
							<input name="correo" type="email" class="form-control" placeholder="Digite correo" required>
						</div>
						<div class="form-group">
							<label>Clave</label> 
							<input name="clave" type="password" class="form-control" placeholder="Digite clave" required>
						</div> 

						<button type="submit" name="registrar" class="btn btn-outline-info btn-block">Registrar</button>
						
					</form>
	
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
</div>