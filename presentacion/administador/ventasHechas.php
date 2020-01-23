<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Buscar ventas</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> 
						<input name="filtro" id="filtro" type="text" class="form-control" placeholder="Ingrese el id de la venta" >
					</div>
				</div>
			</div>
			<h5 class="mt-3">Ventas realizadas</h5>
			<div id="tablaCategorias"></div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administador/buscarVentaAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#tablaCategorias").load(ruta);
		}else{
			$("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/mostrarTodasVentas.php") ?>");
		}
	});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
	$("#tablaCategorias").load("index.php?pid=<?php echo base64_encode("presentacion/administador/mostrarTodasVentas.php") ?>");
});
</script>