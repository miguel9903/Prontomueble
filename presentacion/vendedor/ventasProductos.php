<div class="row mt-3">
	<div class="col-4">
		<div class="card ">
			<div class="card-header bg-primary text-white">Agregar Mueble</div>
			<div class="card-body">
				<form id= "frmventasProducto">
					<div class="form-group">
						<label>Cliente:</label> 
						<select class="form-control" id="clienteVenta" name="clienteVenta">
						<option value="0">Seleccione cliente</option>
							<?php
							  $cliente = new Cliente();
						      $clientes = $cliente -> consultarTodos();
								 foreach ($clientes as $c){
								    echo "<option value='" . $c -> getId() . "'>" . $c -> getNombre() . " " . $c->getApellido() . "</option>";
								  }
						     ?>
						</select>
					</div>
				    <div class="form-group">
						<label>Producto:</label> 
						<select class="form-control" id="productoVenta" name="productoVenta">
						<option value="0">Seleccione producto</option>
							<?php
							  $mueble = new Mueble();
						      $muebles = $mueble -> consultarTodosActivos();
								 foreach ($muebles as $m){
								    echo "<option value='" . $m -> getId() . "'>" . $m -> getDescripcion() . "</option>";
								  }
						     ?>
						</select>
					</div>
					<!-- <div class="form-group">
						<label>Descripcion:</label> 
						<textarea id="" name="" class="form-control" required></textarea>
					</div> -->
					<div class="form-group">
						<label>Cantidad:</label> 
						<input id="" name="cantidad" type="number" class="form-control" placeholder="Digite cantidad" min="1" max="100" required>
					</div>
					<div class="form-group">
						<label>Precio:</label> 
						<input id="idPrecio" name="precio" type="number" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>Existencias:</label> 
						<input id="idExistencias" name="existencias" type="number" class="form-control" readonly="">
					</div>
					<span id="btnAgregarProducto" class="btn btn-primary">Agregar al carrito</span>
					<span id="btnVacTablaVenta" class="btn btn-danger">Vaciar tabla</span>
					<span id="btnRecargarProducto" class="btn btn-success"><i class="fas fa-sync-alt"></i></span>
				</form>
			</div>
		</div>
	</div>
	
	<div class="col-8">
		<div id="tablaVentasCarrito"></div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
 	$("#clienteVenta").select2();
 	$("#productoVenta").select2();
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	$("#tablaVentasCarrito").load("index.php?pid=<?php echo base64_encode("presentacion/vendedor/tablaCarrito.php");?>");
	
 	$("#productoVenta").change(function (){
		$.ajax({
			type: "POST",
			data: "idproducto=" + $("#productoVenta").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/vendedor/llenarFormularioMuebleAjax.php");?>",
			success: function(res){
				dato = jQuery.parseJSON(res);
				$("#idPrecio").val(dato['precio']);
				$("#idExistencias").val(dato['existencias']);	
				//$("#idFoto").prepend('<img src="' + dato['foto'] + '" width="100"/>');	
			}
		});
 	});

 	$("#btnRecargarProducto").click(function (){
		$.ajax({
			type: "POST",
			data: "idproducto=" + $("#productoVenta").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/vendedor/llenarFormularioMuebleAjax.php");?>",
			success: function(res){
				dato = jQuery.parseJSON(res);
				$("#idExistencias").val(dato['existencias']);	
			}
		});
 	 });
 	
 	$("#btnAgregarProducto").click(function (){	
		vacios = validarFormVacio('frmventasProducto');
		if(vacios > 0){
		   alert("No pueden quedar campos vacios");	
		   return false;
		}
		$.ajax({
			type: "POST",
			data: $("#frmventasProducto").serialize(),
			url: "index.php?pid=<?php echo base64_encode("presentacion/vendedor/agregarProductoTemp.php");?>",
			success: function(res){
				$("#tablaVentasCarrito").load("index.php?pid=<?php echo base64_encode("presentacion/vendedor/tablaCarrito.php");?>");
			}
		});
 	});

 	$("#btnVacTablaVenta").click(function (){	
 		$.ajax({
 			url: "index.php?pid=<?php echo base64_encode("presentacion/vendedor/vaciarTablaVentas.php");?>",
 			success: function(res){
 				$("#tablaVentasCarrito").load("index.php?pid=<?php echo base64_encode("presentacion/vendedor/tablaCarrito.php");?>");
 			}
 		 	});
 	 	});
});
</script>

<script type="text/javascript">
	function qutarProducto(indice){
		$.ajax({
			type: "POST",
			data: "indice=" + indice,
			url: "index.php?pid=<?php echo base64_encode("presentacion/vendedor/quitarProducto.php");?>",
			success: function(res){
				$("#tablaVentasCarrito").load("index.php?pid=<?php echo base64_encode("presentacion/vendedor/tablaCarrito.php");?>");
				alertify.success("Producto removido con exito");
			}
		});
	}

	function registrarVenta(){
		$.ajax({
			url: "index.php?pid=<?php echo base64_encode("presentacion/vendedor/registrarVenta.php");?>",
			success: function(res){
				$("#tablaVentasCarrito").load("index.php?pid=<?php echo base64_encode("presentacion/vendedor/tablaCarrito.php");?>");
				$("#frmventasProducto")[0].reset();
				alertify.success("Venta registrada con exito");
			}
		});
	}
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
