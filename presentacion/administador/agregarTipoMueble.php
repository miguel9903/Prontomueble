<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$error = 0;
if (isset($_POST['registrar'])) {  
    $tipoMuebleRegistrar = new TipoMueble("", $_POST['descripcion'], "1");
    $tipoMuebleRegistrar -> insertar();
    $error = 1;
}

$tipoMueble = new TipoMueble();
$tiposMuebles = $tipoMueble -> consultarTodos();
?>

<div class="container mt-3">
<!-- Modal -->
<div class="modal fade" id="actualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tipo de mueble</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmModTipoMueble">
				<input type="text" hidden="" name="idTipoMueble" id="idTipoMueble">
				<label>Tipo de mueble: </label>
				<input type="text" name="idDescripcion" id="idDescripcion" class="form-control">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModificarTipoMueble">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

	<h3>Agregar tipo de mueble</h3>
	<div class="row mt-3">
		<div class="col-4">
			<div class="card ">
				<div class="card-header bg-primary text-white">Tipo de mueble</div>
				<div class="card-body">
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarTipoMueble.php") ?>">
						<div class="form-group">
							<label>Tipo mueble::</label> 
							<input id="tipoMueble" name="descripcion" type="text" class="form-control" placeholder="Digite tipo de mueble" required>
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>	
					</form>
				</div>
			</div>
		</div>
		<div class="col-8">
		<?php 
		  if (count($tiposMuebles) == 0) {
		?>
		<div class="alert alert-danger" role="alert">
  			Por el momento no hay tipos de mueble registrados o activos.
		</div>
		<?php 
		  }else {
		 ?>
		   <table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Descripcion</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>				
			    <?php 
					foreach ($tiposMuebles as $tp){
			    ?>
					  <tr>
					  <td><?php echo $tp -> getId()?></td>
					  <td><?php echo $tp -> getDescripcion()?></td>
					  <td><span id="btnAgregarTipoMueble" class="btn btn-warning text-white" data-toggle="modal" data-target="#actualizarCategoria" onclick="agregarDatos('<?php echo $tp -> getId()?>','<?php echo $tp -> getDescripcion()?>')">Editar</span></td>
					  
					  <?php 
					  if ($tp -> getEstado() == 0) {
					  ?>
					      <td><span id="btnAgregarTipoMueble" class="btn btn-success text-white" onclick="eliminarTipoMueble('<?php echo $tp -> getId()?>')">Habilitar</span></td>
					  <?php 
					  }else if ($tp -> getEstado() == 1) {
					  ?>
					      <td><span id="btnAgregarTipoMueble" class="btn btn-danger text-white" onclick="eliminarTipoMueble('<?php echo $tp -> getId()?>')">Deshabilitar</span></td>
					  <?php 
					  }	      
					  ?>
					  </tr>
			    <?php  
					}						
				?>
			</tbody>
		</table> 
	    <?php  
		  }
		  if ($error == 1) {
	    ?>
	    <div class="alert alert-success" role="alert">
  			Tipo de mueble registrado con exito.
		</div>
		<?php
		  }  
		?>
		</div>
		<div class="col-0"></div>
	</div>
</div>

<script type="text/javascript">
	function agregarDatos(idTipoMueble,descripcion){
		$("#idTipoMueble").val(idTipoMueble);
		$("#idDescripcion").val(descripcion);	
	}

	function eliminarTipoMueble(idTipoMueble){

		alertify.confirm('¿Desea eliminar el tipo de mueble?', function(){ 
			$.ajax({
				type: "POST",
				data: "idTipoMueble" + idTipoMueble,
				url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/eliminarTipoMuebleAjax.php");?>",
				success: function(res){
				  alertify.success("Estado del tipomueble modificado con exito");	
				}
			});
			}, function(){ 
				alertify.error('Operacion cancelada')
			});
	
	}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#btnModificarTipoMueble").click(function(){
		$.ajax({
			type: "POST",
			data: $("#frmModTipoMueble").serialize(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/modificarTipoMuebleAjax.php");?>",
			success: function(res){
			  alertify.success("Tipo de mueble modificado con exito");	
			}
		});
	});
});
</script>

