<h4>Realizar venta</h4>
<?php
if (isset($_SESSION['carrito'])) {
    print_r($_SESSION['carrito']);
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 	
		$total = 0;
		$i = 0;
		foreach ($_SESSION['carrito'] as $key){
		    $subtotal = 0;
		    $datos = explode("-", $key);
		?>
		   <tr>
		     <td><?php echo $datos[0]?></td>
		     <td><?php echo $datos[1]?></td>
		     <td><?php echo $datos[2]?></td>
		     <td><?php echo $datos[3]?></td>
		     <?php 
		      $subtotal = (int)($datos[2] * $datos[3]);
		     ?>
		     <td><?php echo $subtotal?></td>
		     <td><span class='btn btn-danger' onclick="qutarProducto('<?php echo $i?>')">Eliminar</span></td>
		  </tr>
		<?php 
		    $i++;
		    $total = $total + $subtotal;
		}
		?>
		<tr>
		 <td colspan="3">Su venta va en: <?php echo "$ " . $total?></td>
		</tr>
	</tbody>
</table>

<span class="btn btn-success" onclick="registrarVenta()">$ Realizar venta</span>
<?php
}else {
?>
<div class="alert alert-danger" role="alert">
   No se han agregado productos
</div>
<?php
}
?>

