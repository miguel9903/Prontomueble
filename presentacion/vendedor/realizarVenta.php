<?php
include 'presentacion/validacionVendedor.php';
include 'presentacion/menuVendedor.php';
?>

<div class="container mt-3">
	<h3>Venta de muebles</h3>
	<div class="row mt-3">
		<div class="col-12">
			<span id="btnVenderMueble" class="btn btn-primary">Vender mueble</span>
			<span id="btnVentasHechas" class="btn btn-success">Ventas hechas</span>
		</div>
	</div>
    <div class="row mt-3">
		<div class="col-12">
			<div id="ventaMueble"></div>
			<div id="ventasHechas"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#btnVenderMueble").click(function(){
		esconderSeccionVenta();
		$("#ventaMueble").load("indexAjax.php?pid=<?php echo base64_encode("presentacion/vendedor/ventasProductos.php");?>");
		$("#ventaMueble").show();
	});
	$("#btnVentasHechas").click(function(){
		esconderSeccionVenta();
		$("#ventasHechas").load("indexAjax.php?pid=<?php echo base64_encode("presentacion/vendedor/ventasHechas.php");?>");
		$("#ventasHechas").show();
	});

	function esconderSeccionVenta(){
		$("#ventaMueble").hide();
		$("#ventasHechas").hide();
	}
});
</script>

