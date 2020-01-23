<?php
$filtro = $_GET['filtro'];
$cliente = new Cliente();
$clientes = $cliente -> buscar($filtro);
if(count($clientes)>0){
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
		</tr>
	</thead>
	<tbody>
			<?php 
			    foreach ($clientes as $tp){
			?>
				<tr>
				<td><?php echo $tp -> getId()?></td>
			    <td><?php echo $tp -> getNombre()?></td>
			    <td><?php echo $tp -> getApellido()?></td>
			    <td><?php echo $tp -> getCorreo()?></td>
			    <td><?php echo $tp -> getTelefono()?></td>
			    <td><div id="estado<?php echo $tp -> getId()?>"><?php echo $tp -> getEstado()?></div></td>
				</tr>	
			<?php  
				}						
			?>
	</tbody>
</table>
     <div class="alert alert-success" role="alert">
		<?php echo count($clientes)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>

