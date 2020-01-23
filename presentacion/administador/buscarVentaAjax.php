<?php
$filtro = $_GET['filtro'];
$venta = new Venta();
$ventas = $venta -> buscar($filtro);
if(count($ventas)>0){
    ?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Fecha</th>
			<th>Total</th>
			<th>Vendedor</th>
			<th>Cliente</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			<?php 
			    foreach ($ventas as $tp){
			?>
				<tr>
					<td><?php echo $tp -> getId();?></td>
			    	<td><?php echo $tp -> getFecha();?></td>
			    	<td><?php echo $tp -> getTotal();?></td>
			    	<td><?php echo $tp -> getVendedor();?></td>
			    	<td><?php echo $tp -> getCliente();?></td>
			    	<td><a href="#" class="btn btn-success"><i class="fas fa-file-download"></i> Factura</a></td>	
				</tr>		
			<?php  
				}						
			?>
	</tbody>
</table>
     <div class="alert alert-success" role="alert">
		<?php echo count($ventas)?> registro(s) encontrado(s)
	</div>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
	No se encontraron resultados
</div>
<?php } ?>

