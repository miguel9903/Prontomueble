<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$error = 0;
if (isset($_POST['registrar'])) {

    $proveedor = new Proveedor("", $_POST['nombreProv'], $_POST['direccionProv'], $_POST['correoProv'], $_POST['telefonoProv'], "1");
    $proveedor -> insertar();
    $ultimoProv = $proveedor -> ultimoProv();
    //$ultimoProv = 
    $perContacto = new PersonaContacto($_POST['cedulaPC'], $_POST['nombrePC'], $_POST['apellidoPC'], $_POST['correoPC'], $_POST['cedulaPC'], $_POST['telefonoPC'], $ultimoProv, "1");
    $perContacto -> insertar();
    //$administrador = new Administrador("", "", "",  $_POST['correo']);
    //$cliente = new Cliente("", "", "", $_POST['correo'], $_POST['clave']);
    
    /*if ($proveedor->existeCorreo() || $administrador->existeCorreo() || $cliente->existeCorreo()) {
        $error = 1;
    }else{
        $proveedor->insertar();
    }*/
}
?>

<div class="container mt-3">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Registro Proveedor</div>
				<div class="card-body">
				
					<?php 
					   if (isset($_POST['registrar'])) {
					?>
					     <div class="alert alert-<?php echo ($error==0) ? "success": "danger";?> alert-dismissible fade show" role="alert">
					       <?php echo ($error==1) ? "El correo " . $_POST['correo'] . " ya existe" : "Proveedor registrado con exito";?>
					       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					       <span aria-hidden="true">&times;</span>
					       </button>
					     </div>
					 <?php 
					   }
					 ?>
				
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarProveedor.php") ?>">
					
					<h5 class="text-center">Informacion del proveedor</h5>
					
						<div class="form-group">
							<label>Nombre:</label> 
							<input name="nombreProv" type="text" class="form-control" placeholder="Digite nombre" required>
						</div>
						<div class="form-group">
							<label>Direccion:</label> 
							<input name="direccionProv" type="text" class="form-control" placeholder="Digite direccion" required>
						</div>
						<div class="form-group">
							<label>Correo:</label> 
							<input name="correoProv" type="email" class="form-control" placeholder="Digite correo" required>
						</div>
						<div class="form-group">
							<label>Telefono:</label> 
							<input name="telefonoProv" type="text" class="form-control" placeholder="Digite telefono" required>
						</div> 
						
						<div class="form-group">
							<label></label> 
						</div> 
		
						
						<h5 class="text-center">Informacion persona de contacto</h5>
		
						<div class="form-group">
							<label>Cedula:</label> 
							<input name="cedulaPC" type="text" class="form-control" placeholder="Digite nombre" required>
						</div>				
						<div class="form-group">
							<label>Nombre:</label> 
							<input name="nombrePC" type="text" class="form-control" placeholder="Digite nombre" required>
						</div>
						<div class="form-group">
							<label>Apellido:</label> 
							<input name="apellidoPC" type="text" class="form-control" placeholder="Digite direccion" required>
						</div>
						<div class="form-group">
							<label>Correo:</label> 
							<input name="correoPC" type="email" class="form-control" placeholder="Digite correo" required>
						</div>
						<div class="form-group">
							<label>Telefono:</label> 
							<input name="telefonoPC" type="text" class="form-control" placeholder="Digite telefono" required>
						</div> 

						<button type="submit" name="registrar" class="btn btn-outline-primary btn-block">Registrar</button>
						
					</form>
	
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
</div>