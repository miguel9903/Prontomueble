<?php 
include "presentacion/validacionAdministrador.php";
include 'presentacion/menuAdministrador.php';

$hotel = new Hotel();
$registros = $hotel->consultarTodos();


?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar Hoteles</div>
				<p class="ml-4 mt-4">Seleccione un hotel: </p>
				<div class="card-body">
				
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Direccion</th>
								<th scope="col">Ciudad</th>
								<th scope="col">Nro. habitaciones</th>
								<th scope="col">Disponibles</th>
								<th ></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $h){
							    echo "<tr>";
							    echo "<td>" . $h -> getNombre() . "</td>";
							    echo "<td>" . $h -> getDireccion() . "</td>";
							    echo "<td>" . $h -> getCiudad() -> getNombre() . "</td>";
							    $habitacion = new Habitacion("", "", "", $h->getId());
							    echo "<td>" . $habitacion->cantidadHabitaciones() . "</td>";
							    echo "<td>" . $habitacion->cantidadHabitacionesDisponibles() . "</td>";
							    echo "<td>";
							    echo "<a href='index.php?pid=" . base64_encode("presentacion/administador/consultarHabitaciones.php") . "&idhotel=" . $h -> getId() ."'>";
							    echo "<i class='fas fa-plus-square' data-toggle='tooltip' data-placement='left' title='Ver habitaciones'></i>";
							    echo "</a>";		    
							    echo "</td>";
							    echo "</tr>";
							}						
							?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>