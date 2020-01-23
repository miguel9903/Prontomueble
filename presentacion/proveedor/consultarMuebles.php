<?php 
include 'presentacion/validacionProveedor.php';
include 'presentacion/menuProveedor.php';
?>

<div class="container mt-3">

<!-- Modal modificar mueble -->
	<div class="modal fade" id="actualizarMueble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Editar mueble</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         				 <span aria-hidden="true">&times;</span>
       					 </button>
      			 </div>
      				<div class="modal-body">
						<form id="frmModMueble">
							<input type="text" hidden="" name="idMueble" id="idMueble">
							<div class="form-group">
								<label>Descripcion:</label> 
								<input name="descripcion" type="text" class="form-control" id="descripcion">
							</div>
							<div class="form-group">
								<label>Tipo de mueble:</label> 
      							<select class="form-control" name="tipo_mueble" id="selectTipoMueble">
									<?php
								    $tipoMueble = new TipoMueble();
								    $tiposMuebles = $tipoMueble -> consultarTodos();
								    foreach ($tiposMuebles as $tp){
								        echo "<option value='" . $tp -> getId() . "'>" . $tp -> getDescripcion() . "</option>";
								    }
								    ?>
								</select>
					 		</div>
							<div class="form-group">
								<label>Material:</label> 
      							<select class="form-control" name="material" id="selectMaterial">
									<?php
								    $material = new Material();
								    $materiales = $material -> consultarTodos();
								    foreach ($materiales as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
							</div>
							<div class="form-group">
								<label>Color:</label> 
      							<select class="form-control" name="color" id="selectColor">
									<?php
								    $color = new Color();
								    $colores = $color -> consultarTodos();
								    foreach ($colores as $c){
								        echo "<option value='" . $c -> getId() . "'>" . $c -> getNombre() . "</option>";
								    }
								    ?>
								</select>
				    		</div>
				    		<div class="form-group">
								<label>Pais:</label> 
      	      					<select class="form-control" name="pais" id="selectPais">
									<?php
								    $pais = new Pais();
								    $paises = $pais -> consultarTodos();
								    foreach ($paises as $p){
								        echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() . "</option>";
								    }
								    ?>
								</select>
				    		</div>
				    		<div class="form-group">
								<label>Marca:</label> 
      							<select class="form-control" name="marca" id="selectMarca">
									<?php
								    $marca = new Marca();
								    $marcas = $marca -> consultarTodos();
								    foreach ($marcas as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
				   			 </div>	   
				   			 
				   			 <!-- <div class="form-group">
								<label>Foto:</label> 
									<input name="foto" type="text" class="form-control" id="foto">
				   			 </div>	    -->
				   			 
				   			 
				   			<div class="form-row mb-3">
   								<div class="col-6">
									<label>Existencias:</label> 
									<input name="existencias" type="number" class="form-control" id="existencias">
    							</div>
    							<div class="col-6">
									<label>Peso:</label> 
									<input name="peso" type="text" class="form-control" id="peso">
    							</div>
  							</div>
  							
  						    <div class="form-row mb-3">
    							<div class="col-6">
									<label>Medidas:</label> 
									<input name="medidas" type="text" class="form-control" id="medidas">
    							</div>
  							</div>
						</form>
      				</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModificarMueble">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

	<h3>Editar muebles</h3>
	<div class="row mt-3">
		<div class="col-12">
				<div class="card">
				<div class="card-header bg-primary text-white">Buscar muebles</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> 
						<input name="filtro" id="filtro" type="text" class="form-control" placeholder="Ingrese el id o nombre del tipo de mueble" >
					</div>
				</div>
			</div>
			<div id="tablaCategorias"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/buscarMuebleAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#tablaCategorias").load(ruta);
		}
	});
});
</script>


<script type="text/javascript">
/*$(document).ready(function(){
 	$("#selectTipoMueble").select2();
 	$("#selectMaterial").select2();
 	$("#selectColor").select2();
 	$("#selectPais").select2();
 	$("#selectProveedor").select2();
 	$("#selectMarca").select2();
});*/
</script>

<script type="text/javascript">
<!-- Cargar datos tipo mueble -->
	function agregarDatos(idMueble,descripcion,tipo_mueble,material,medidas,peso,color,marca,pais,precio,existencias,proveedor){
		$("#idMueble").val(idMueble);
		$("#descripcion").val(descripcion);
	 	$("#selectTipoMueble").val(tipo_mueble);
		$("#selectMaterial").val(material);
		$("#medidas").val(medidas);
		$("#peso").val(peso);
	 	$("#selectColor").val(color);
	 	$("#selectMarca").val(marca);
	 	$("#selectPais").val(pais);
		$("#precio").val(precio);
		$("#existencias").val(existencias);
	//	$("#foto").val(foto);
	 	$("#selectProveedor").val(proveedor);
	}
</script>

<!-- Modificar mueble -->
<script type="text/javascript">
$(document).ready(function(){
	$("#btnModificarMueble").click(function(){
		$.ajax({
			type: "POST",
			data: $("#frmModMueble").serialize(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/modificarMuebleAjax.php");?>",
			success: function(res){
			alertify.success("Mueble modificado con exito");	
			}
		});
	});
});
</script>