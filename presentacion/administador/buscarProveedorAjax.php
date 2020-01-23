<?php
$filtro = $_GET['filtro'];
$proveedor = new Proveedor();
$proveedores = $proveedor -> buscar($filtro);
if(count($proveedores)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Estado</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($proveedores as $p) {
	        echo "<tr>";
	        echo "<td>" . $p -> getNombre() . "</td>";
	        echo "<td>" . $p -> getApellido() . "</td>";
	        echo "<td>" . $p -> getCorreo() . "</td>";
	        echo "<td><div id='estado". $p->getId() . "'>" . $p -> getEstado() . "</div></td>";

	        echo "<td>";
	        if($p -> getEstado() == 1){
	            echo "<a id='cambiarEstado" . $p->getId() . "' href='#'>";
	            echo "<div id='iconoEstado" . $p->getId() . "'><i id='icono" . $p->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i></div>";
	            echo "</a>";
	        }else{
	            echo "<a id='cambiarEstado" . $p->getId() . "' href='#'>";
	            echo "<div id='iconoEstado" . $p->getId() . "'><i id='icono" . $p->getId() . "' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i></div>";
	            echo "</a>";
	        }
	        echo "</td>";
	        echo "</tr>";
	    }    
    ?>
	</tbody>
</table>
     <div class="alert alert-success" role="alert">
		<?php echo count($proveedores)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>

<script>
$(document).ready(function(){
<?php 
foreach ($proveedores as $p) {
    echo "$(\"#cambiarEstado" . $p->getId() . "\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarEstadoProveedorAjax.php") . "&idproveedor=" . $p->getId() . "\";\n";
    echo "$(\"#estado" . $p->getId() . "\").load(ruta);\n";
    echo "$(\"#icono" . $p->getId() . "\").tooltip('hide');\n";
    echo "ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarIconoEstadoProveedorAjax.php") . "&idproveedor=" . $p->getId() . "\";\n";
    echo "$(\"#iconoEstado" . $p->getId() . "\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>



