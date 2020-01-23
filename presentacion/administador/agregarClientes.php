<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$error = 0;
if (isset($_POST['registrar'])) {  
    
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Bogota");
    $fecha =  date("Y-m-d");
     
    $administrador = new Administrador("", "", "",  $_POST['correo']);
    $cliente = new Cliente($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['cedula'], $fecha, $fecha,  $_POST['telefono'], "1");
    
    if ($cliente -> existeCliente()) {
        $error = 1;
    }else{
        if ($administrador->existeCorreo() || $cliente->existeCorreo()) {
            $error = 2;
        }else{
            $cliente->insertar();
        }
    }
}
?>

<div class="container mt-3">

<!-- Modal -->
<div class="modal fade" id="actualizarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmModCliente">
				<input type="text" hidden="" name="cedula" id="cedula">
					<div class="form-group">
						<label>Nombre:</label> 
						<input id="nombre" name="nombre" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Apellido:</label> 
						<input id="apellido" name="apellido" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Correo:</label> 
					<input id="correo" name="correo" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Telefono:</label> 
						<input id="telefono" name="telefono" type="text" class="form-control">
				   </div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModificarCliente">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

	<h3>Clientes</h3>
	<div class="row mt-3">
		<div class="col-3">
			<div class="card ">
				<div class="card-header bg-primary text-white">Agregar cliente</div>
				<div class="card-body">
									
					<?php 
					if (isset($_POST['registrar'])) {  
					   if ($error == 0) {
					?>    
					    <div class="alert alert-success" role="alert">
					    	Cliente registrado con exito
					    </div>	
					<?php 	 
					}else if ($error == 1) {
					?>
					    <div class="alert alert-warning" role="alert">
					    	El cliente ya existe
					    </div>
					<?php 
					}else if ($error == 2) {
					?>
					    <div class="alert alert-warning" role="alert">
					   		El correo <?php echo $_POST['correo']?> ya existe
					    </div>
					<?php 
					   }
					}
					?>
				
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarClientes.php") ?>">
						<div class="form-group">
							<label>Cedula:</label> 
							<input name="cedula" type="text" class="form-control" placeholder="Digite cedula" required>
						</div>
						<div class="form-group">
							<label>Nombre:</label> 
							<input name="nombre" type="text" class="form-control" placeholder="Digite nombre" required>
						</div>
						<div class="form-group">
							<label>Apellido:</label> 
							<input name="apellido" type="text" class="form-control" placeholder="Digite apellido" required>
						</div>
						<div class="form-group">
							<label>Correo:</label> 
							<input name="correo" type="text" class="form-control" placeholder="correo" required>
						</div>
						<div class="form-group">
							<label>Telefono:</label> 
							<input name="telefono" type="text" class="form-control" placeholder="telefono" required>
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card">
				<div class="card-header bg-primary text-white">Buscar clientes</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> 
						<input name="filtro" id="filtro" type="text" class="form-control" placeholder="Ingrese la cedula, nombre o apellido del cliente" >
					</div>
				</div>
			</div>
			<div id="tablaCategorias"></div>
		</div>
		<div class="col-0"></div>
	</div>
</div>



<script type="text/javascript">
<!-- Cargar datos tipo mueble -->
	function agregarDatos(cedula,nombre,apellido,correo,telefono){
		$("#cedula").val(cedula);
		$("#nombre").val(nombre);	
		$("#apellido").val(apellido);
		$("#correo").val(correo);	
		$("#telefono").val(telefono);
	}

	
<!-- Cambiar estado tipo mueble -->
	function eliminarCliente(idCliente){
		alertify.confirm('¿Desea eliminar el cliente?', function(){ 
			$.ajax({
				type: "POST",
				data: "idCliente" + idCliente,
				url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/eliminarClienteAjax.php");?>",
				success: function(res){
				  alertify.success("Cliente eliminado con exito");	
				}
			});
			}, function(){ 
				alertify.error('Operacion cancelada')
			});
	
	}
</script>


<!-- Modificar tipo mueble -->
<script type="text/javascript">
$(document).ready(function(){
	$("#btnModificarCliente").click(function(){
		$.ajax({
			type: "POST",
			data: $("#frmModCliente").serialize(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/modificarClienteAjax.php");?>",
			success: function(res){
			alertify.success("Cliente modificado con exito");	
			}
		});
	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/buscarClienteAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#tablaCategorias").load(ruta);
		}
	});
});
</script>

<script type="text/javascript">
	function validarFormVacio(formulario){
		datos = $('#' + formulario).serialize();
		d = datos.split('&');
		vacios = 0;
		for (i=0; i<d.length; i++){
			controles = d[i].split("=");
			if (controles[1]=="A" || controles[1]=="") {
				vacios++;
			}
		}
		return vacios;
	}
</script>