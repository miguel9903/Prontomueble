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
    $fecha_actualizacion =  date("Y-m-d");
    $cliente = new Cliente($cliente->getId(), $_POST['nombre'], $_POST['apellido'], $_POST['correo'], "", "", $fecha_actualizacion);
    $administrador = new Administrador("", "", "",  $_POST['correo']);
    if ($cliente->existeCorreoDiferente()|| $administrador->existeCorreo()) {
        $error = 1;
    }else{
        $cliente->actualizarPerfil();
    }
}
?>

<div class="container mt-3">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">	
			<div class="card ">
				<div class="card-header bg-info text-white">Informacion personal</div>
				<div class="card-body">
			
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/cliente/editarPerfil.php") ?>">
						<div class="form-group">
							<label>Nombre</label> 
							<input name="nombre" type="text" class="form-control" placeholder="Digite nombre" 
							value=<?php echo $cliente->getNombre()?> required>
						</div>
						<div class="form-group">
							<label>Apellido</label> 
							<input name="apellido" type="text" class="form-control" placeholder="Digite apellido" 
							value=<?php echo $cliente->getApellido()?> required>
						</div>
						<div class="form-group">
							<label>Correo</label> 
							<input name="correo" type="email" class="form-control" placeholder="Digite correo"
							value=<?php echo $cliente->getCorreo()?> required>
						</div>
						
						<?php 
						if (isset($_POST['editar'])) {			
						?>
					     <div class="alert alert-<?php echo ($error==0) ? "success": "danger";?> alert-dismissible fade show" role="alert">
					       <?php echo ($error==1) ? "El correo " . $_POST['correo'] . " ya existe" : "Datos modificados con exito";?>
					       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					       <span aria-hidden="true">&times;</span>
					       </button>
					     </div> 
					    <?php 
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