<?php
$venta = new Venta();
$ventas = $venta -> consultarTodos();
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
			    	<td><?php echo $tp -> getVendedor() ->getNombre();?></td>
			    	<td><?php echo $tp -> getCliente()-> getNombre();?></td>
			    	<td><a href="index.php?pid=<?php echo base64_encode("presentacion/vendedor/generarFacturaVenta.php")?>&idVenta=" class="btn btn-success"><i class="fas fa-file-download"></i> Factura</a></td>	    	
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