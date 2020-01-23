<?php
$filtro = $_GET['filtro'];
$muebleB = new Mueble();
$mueblesB = $muebleB -> buscarActivivos($filtro);
if(count($mueblesB)>0){
?>
<div class="container mt-3">    
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Descripcion</th>
			<th>Tipo mueble</th>
			<th>Existencias</th>
			<th>Precio</th>
			<th>Foto</th>
		</tr>
	</thead>
	<tbody>
			<?php 
			    foreach ($mueblesB as $tp){
			?>
				<tr>
				<td><?php echo $tp -> getId()?></td>
			    <td><?php echo $tp -> getDescripcion()?></td>
			    <td><?php echo $tp -> getTipoMueble() -> getDescripcion()?></td>
			    <td><?php echo $tp -> getExistencias()?></td>
			 	<td><?php echo $tp -> getPrecio()?></td>
			    <td><img src="<?php echo $tp -> getFoto()?>" width="100"></td> 		
				</tr>
				
			<?php  
				}						
			?>
	</tbody>
</table>
     <div class="alert alert-success" role="alert">
		<?php echo count($mueblesB)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>
</div>
