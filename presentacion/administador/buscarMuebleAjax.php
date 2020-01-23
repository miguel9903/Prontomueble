<?php
$filtro = $_GET['filtro'];
$muebleB = new Mueble();
$mueblesB = $muebleB -> buscar($filtro);
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
			<th>Estado</th>
			<th>Foto</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			<?php 
			    foreach ($mueblesB as $tp){
			?>
				<tr>
				<td><?php echo $tp -> getId()?></td>
			    <td><?php echo $tp -> getDescripcion()?></td>
			    <td><?php echo $tp -> getTipoMueble()?></td>
			    <td><?php echo $tp -> getExistencias()?></td>
			    <td><?php echo $tp -> getPrecio()?></td>
			    <td><div id="estado<?php echo $tp -> getId()?>"><?php echo $tp -> getEstado()?></div></td>
			    
			    <td><img src="<?php echo $tp -> getFoto()?>" width="100"></td> 
			    <td><span class="btn btn-warning text-white" data-toggle="modal" data-target="#actualizarMueble" onclick="agregarDatos('<?php echo $tp -> getId()?>','<?php echo $tp -> getDescripcion()?>','<?php echo $tp -> getTipoMueble()?>','<?php echo $tp -> getMaterial()?>','<?php echo $tp -> getMedidas()?>','<?php echo $tp -> getPeso()?>','<?php echo $tp -> getColor()?>','<?php echo $tp -> getMarca()?>','<?php echo $tp -> getPais()?>','<?php echo $tp -> getPrecio()?>','<?php echo $tp -> getExistencias()?>','<?php echo $tp -> getProveedor()?>')">Editar</span></td>
			    
					  <?php 
					  if ($tp -> getEstado() == 0) {
					  ?>
					      <td><div id="botonEstado<?php echo $tp -> getId()?>"><span id="cambiarEstado<?php echo $tp -> getId()?>" class="btn btn-success text-white">Habilitar</span></div></td>
					  <?php 
					  }else if ($tp -> getEstado() == 1) {
					  ?>
					      <td><div id="botonEstado<?php echo $tp -> getId()?>"><span id="cambiarEstado<?php echo $tp -> getId()?>" class="btn btn-danger text-white">Deshabilitar</span></div></td>
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
		<?php echo count($mueblesB)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>
</div>

<script>
$(document).ready(function(){
<?php 
foreach ($mueblesB as $c) {
    echo "$(\"#cambiarEstado" . $c->getId() . "\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarEstadoMuebleAjax.php") . "&idmueble=" . $c->getId() . "\";\n";
    echo "$(\"#estado" . $c->getId() . "\").load(ruta);\n";
   // echo "ruta2 = \"indexAjax.php?pid=" . base64_encode("presentacion/administador/cambiarBotonEstadoClienteAjax.php") . "&idcliente=" . $c->getId() . "\";\n";
   // echo "$(\"#botonEstado" . $c->getId() . "\").load(ruta2);\n";
    echo "});\n";
}
?>
});
</script>