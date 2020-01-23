<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$error = 0;
if (isset($_POST['registrar'])) {  
    $proveedor = new Proveedor("", $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['clave'], 1);
    $administrador = new Administrador("", "", "",  $_POST['correo']);
    $cliente = new Cliente("", "", "", $_POST['correo'], $_POST['clave']);
    
    if ($proveedor->existeCorreo() || $administrador->existeCorreo() || $cliente->existeCorreo()) {
        $error = 1;
    }else{
        $proveedor->insertar();
    }
}
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
		$("#ventaMueble").load("vistas/ventas/ventasProductos.php");
		$("#ventaMueble").show();
	});
	$("#btnVentasHechas").click(function(){
		esconderSeccionVenta();
		$("#ventasHechas").load("vistas/ventas/ventasHechas.php");
		$("#ventasHechas").show();
	});

	function esconderSeccionVenta(){
		$("#ventaMueble").hide();
		$("#ventasHechas").hide();
	}
});
</script>

