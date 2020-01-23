<?php
include "presentacion/validacionCliente.php";
include 'presentacion/menuCliente.php';

$idcliente = $_SESSION['id'];
$reserva = new Reserva("", "", $idcliente);
$registros = $reserva -> mostrarReservasCliente();

?>
<div class="container mt-3">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar Reservas</div>
				
				<div class="card-body">
				
				<?php 
				if (count($registros)==0) {
				?>
				  <div class="alert alert-danger alert-dismissible fade show" role="alert">
					  No hay reservas 
				 </div>
				<?php 
				}else{
				?>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
							    <th>Num. habitacion</th>
								<th>Hotel</th>
								<th>Fecha de ingreso</th>
								<th>Fecha de salida</th>
								<th>Num. huespedes</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $r){
							    echo "<tr>";
							    echo "<td>" . $r -> getHabitacion(). "</td>";
							    echo "<td>" . $r -> getHotel() -> getNombre(). "</td>";
							    echo "<td>" . $r -> getFechaIngreso() . "</td>";
							    echo "<td>" . $r -> getFechaSalida() . "</td>";
							    echo "<td>" . $r -> getHuespedes() . "</td>";
							    echo "</tr>";
							}						
							?>
						</tbody>
					</table>
			    <?php 
				}
				?>
				</div>
			</div>
		</div>
	</div>
</div>