<?php 
$tipoMueble = new TipoMueble();
$tiposMuebles = $tipoMueble -> consultarTodos();

 if (count($tiposMuebles) == 0) {
?>
	<div class="alert alert-danger" role="alert">
  	 No se encontraron resultados
	</div>
<?php 
}else {
?>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Descripcion</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>				
			<?php 
			    foreach ($tiposMuebles as $tp){
			?>
				<tr>
			    <td><?php echo $tp -> getId()?></td>
			    <td><?php echo $tp -> getDescripcion()?></td>
			    <td><span class="btn btn-warning text-white" data-toggle="modal" data-target="#actualizarCategoria" onclick="agregarDatos('<?php echo $tp -> getId()?>','<?php echo $tp -> getDescripcion()?>')">Editar</span></td>
					  <?php 
					  if ($tp -> getEstado() == 0) {
					  ?>
					      <td><span id="btnAgregarTipoMueble" class="btn btn-success text-white" onclick="eliminarTipoMueble('<?php echo $tp -> getId()?>')">Habilitar</span></td>
					  <?php 
					  }else if ($tp -> getEstado() == 1) {
					  ?>
					      <td><span id="btnAgregarTipoMueble" class="btn btn-danger text-white" onclick="eliminarTipoMueble('<?php echo $tp -> getId()?>')">Deshabilitar</span></td>
					  <?php 
					  }	      
					  ?>
				</tr>
			<?php  
				}						
			?>
		</tbody>
	</table> 
<?php  
	}
?>

