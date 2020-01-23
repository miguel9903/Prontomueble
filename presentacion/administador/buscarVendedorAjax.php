<?php
$filtro = $_GET['filtro'];
$vendedor = new Vendedor();
$vendedores = $vendedor -> buscar($filtro);
if(count($vendedores)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Estado</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			<?php 
			    foreach ($vendedores as $tp){
			?>
				<tr>
				<td><?php echo $tp -> getId()?></td>
			    <td><?php echo $tp -> getNombre()?></td>
			    <td><?php echo $tp -> getApellido()?></td>
			    <td><?php echo $tp -> getCorreo()?></td>
			    <td><?php echo $tp -> getTelefono()?></td>
			    <td><div id="estado<?php echo $tp -> getId()?>"><?php echo $tp -> getEstado()?></div></td>
			    
			    <td><span class="btn btn-warning text-white" data-toggle="modal" data-target="#actualizarCliente" onclick="agregarDatos('<?php echo $tp -> getId()?>','<?php echo $tp -> getNombre()?>','<?php echo $tp -> getApellido()?>','<?php echo $tp -> getCorreo()?>','<?php echo $tp -> getTelefono()?>')"><i class="fas fa-user-edit" title="editar vendedor"></i></span></td>
					  <?php 
					  if ($tp -> getEstado() == 0) {
					  ?>
					      <td><div id="botonEstado<?php echo $tp -> getId()?>"><span id="cambiarEstado<?php echo $tp -> getId()?>" class="btn btn-success text-white"><i class="fas fa-user-check" title="habilitar vendedor"></i></span></div></td>
					  <?php 
					  }else if ($tp -> getEstado() == 1) {
					  ?>
					      <td><div id="botonEstado<?php echo $tp -> getId()?>"><span id="cambiarEstado<?php echo $tp -> getId()?>" class="btn btn-danger text-white"><i class="fas fa-user-times" title="inhabilitar vendedor"></i></span></div></td>
					  <?php 
					  }	      
					  ?>
				</tr>
				
			<?php  
				}						
			?>
	</tbody>
</table>
     <div class="alert alert-success" role="alert">
		<?php echo count($vendedores)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>


<script>
$(document).ready(function(){
<?php 
foreach ($vendedores as $c) {
    echo "$(\"#cambiarEstado" . $c->getId() . "\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarEstadoVendedorAjax.php") . "&idvendedor=" . $c->getId() . "\";\n";
    echo "$(\"#estado" . $c->getId() . "\").load(ruta);\n";
   // echo "ruta2 = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarBotonEstadoClienteAjax.php") . "&idcliente=" . $c->getId() . "\";\n";
   // echo "$(\"#botonEstado" . $c->getId() . "\").load(ruta2);\n";
    echo "});\n";
}
?>
});
</script>


