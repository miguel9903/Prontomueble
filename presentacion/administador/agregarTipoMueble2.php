<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
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
				<div class="form-group">
					<label>Tipo de mueble: </label>
					<input type="text" name="idDescripcion" id="idDescripcion" class="form-control">
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModificarTipoMueble">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

	<h3>Tipos de mueble</h3>
	<div class="row mt-3">
		<div class="col-4">
			<div class="card ">
				<div class="card-header bg-primary text-white">Agregar tipo de mueble</div>
				<div class="card-body">
				
					<form id="frmAgregarTipoMueble">
						<div class="form-group">
							<label>Tipo mueble::</label> 
							<input id="tipoMueble" name="descripcion" type="text" class="form-control" placeholder="Digite tipo de mueble" required>
						</div>
						<span id="btnAgregarTipoMueble" class="btn btn-success text-white">Agregar</span>
					</form>
					
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="card">
				<div class="card-header bg-primary text-white">Buscar tipos de mueble</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> 
						<input name="filtro" id="filtro" type="text" class="form-control" placeholder="Ingrese el id o nombre del tipo de mueble" >
					</div>
				</div>
			</div>
			<div id="tablaCategorias"></div>
		</div>
		<div class="col-0"></div>
	</div>
</div>


<!-- Agregar tipo mueble -->
<script type="text/javascript">
$(document).ready(function(){
	$("#btnAgregarTipoMueble").click(function(){
		vacios = validarFormVacio('frmAgregarTipoMueble');
		if(vacios > 0){
		   alert("No pueden quedar campos vacios");	
		   return false;
		}
		$.ajax({
			type: "POST",
			data: $("#frmAgregarTipoMueble").serialize(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/agregarTipoMuebleAjax.php");?>",
			success: function(res){
			  $("#frmAgregarTipoMueble")[0].reset();
			  $("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/tablaCategorias.php") ?>");
			  alertify.success("Tipo de mueble agregado con exito");	
			}
		});
	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/tablaCategorias.php") ?>");
});
</script>

<script type="text/javascript">
<!-- Cargar datos tipo mueble -->
	function agregarDatos(idTipoMueble,descripcion){
		$("#idTipoMueble").val(idTipoMueble);
		$("#idDescripcion").val(descripcion);	
	}

	
<!-- Cambiar estado tipo mueble -->
	function eliminarTipoMueble(idTipoMueble){
		alertify.confirm('¿Desea habilitar/deshabilitar el tipo de mueble?', function(){ 
			$.ajax({
				type: "POST",
				data: "idTipoMueble=" + idTipoMueble,
				url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/eliminarTipoMuebleAjax.php");?>",
				success: function(res){
					$("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/tablaCategorias.php") ?>");
				alertify.success("Estado de mueble modificado con exito");	
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
	$("#btnModificarTipoMueble").click(function(){
		$.ajax({
			type: "POST",
			data: $("#frmModTipoMueble").serialize(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/modificarTipoMuebleAjax.php");?>",
			success: function(res){
				$("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/tablaCategorias.php") ?>");
			    alertify.success("Tipo de mueble modificado con exito");	
			}
		});
	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/buscarTipoMuebleAjax.php"); ?>&filtro="+$("#filtro").val();
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