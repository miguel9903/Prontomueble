<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$error = 0;
if (isset($_POST['registrar'])){  
    
    $rutaLocal = $_FILES['foto']['tmp_name'];
    $tipo = $_FILES['foto']['type'];
    
    if($tipo == "image/png" || $tipo == "image/jpeg"){
        $fecha = new DateTime();
        $rutaRemota = "imagenes/". $fecha -> getTimestamp() . (($tipo == "image/png")?".png":".jpg");
        copy($rutaLocal, $rutaRemota);
        
       /* $mueble = new Mueble($_GET['idEstudiante']);
        $estudiante -> consultar();
        if($estudiante -> getFoto() != ""){
            unlink($estudiante -> getFoto());
        }*/
       // $estudiante = new Estudiante($_GET['idEstudiante'],"","","","","",$rutaRemota);
       //$estudiante -> cambiarFoto();
        $mueble = new Mueble("", $_POST['descripcion'], $_POST['tipo_mueble'], $_POST['material'], $_POST['color'], $_POST['medidas'], $_POST['maarca'], $_POST['pais'], $_POST['precio'], $_POST['existencias'], $rutaRemota, $_POST['proveedor']);
        $mueble -> insertar();
    }else{
        $error = 1;
    }
}
?>

<div class="container mt-3">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<div class="card ">
				<div class="card-header bg-primary text-white">Agregar Mueble</div>
				<div class="card-body">
								
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarMueble.php") ?>" enctype="multipart/form-data" >
						<div class="form-group">
							<label>Descripcion:</label> 
							<input name="descripcion" type="text" class="form-control" placeholder="Digite descripcion" required>
						</div>
						
						<div class="form-row mb-3">
   							<div class="col">
   								<label>Tipo mueble:</label> 
      							<select class="form-control" name="tipo_mueble">
									<?php
								    $tipoMueble = new TipoMueble();
								    $tiposMuebles = $tipoMueble -> consultarTodos();
								    foreach ($tiposMuebles as $tp){
								        echo "<option value='" . $tp -> getId() . "'>" . $tp -> getDescripcion() . "</option>";
								    }
								    ?>
								</select>
    						</div>
   	 						<div class="col">
   	 							<label>Material:</label> 
      							<select class="form-control" name="material">
									<?php
								    $material = new Material();
								    $materiales = $material -> consultarTodos();
								    foreach ($materiales as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col">
   	 							<label>Color:</label> 
      							<select class="form-control" name="color">
									<?php
								    $color = new Color();
								    $colores = $color -> consultarTodos();
								    foreach ($colores as $c){
								        echo "<option value='" . $c -> getId() . "'>" . $c -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
  						</div>
												
						<div class="form-row mb-3">
    						<div class="col">
   	 							<label>Marca:</label> 
      							<select class="form-control" name="marca">
									<?php
								    $marca = new Marca();
								    $marcas = $marca -> consultarTodos();
								    foreach ($marcas as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col">
   	 							<label>Pais:</label> 
      							<select class="form-control" name="pais">
									<?php
								    $pais = new Pais();
								    $paises = $pais -> consultarTodos();
								    foreach ($paises as $p){
								        echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						 <div class="col">
   	 							<label>Precio:</label>
   	 							<input name="precio" type="number" class="form-control" placeholder="Precio" required> 
    						</div>
  						</div>
						
						<div class="form-row mb-3">
   							<div class="col-2">
								<label>Existencias:</label> 
								<input name="existencias" type="number" class="form-control" placeholder="Existencias" required>
    						</div>
    						<div class="col-5">
   	 							<label>Foto:</label> 
   	 							<input name="foto" type="file" class="form-control" required>
    						</div>
    						<div class="col-5">
   	 							<label>Proveedor:</label> 
      							<select class="form-control" name="proveedor">
									<?php
								    $prov = new Proveedor();
								    $proveedores = $prov -> consultarTodos();
								    foreach ($proveedores as $pr){
								        echo "<option value='" . $pr -> getId() . "'>" . $pr -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
  						</div>
  						
  						<div class="input-group mb-3">
                          	<div class="custom-file">
                            	<input type="file" class="custom-file-input" name="foto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required="required">
                            	<label class="custom-file-label">Seleccione un archivo png o jpg</label>
                          </div>
                        </div>
  						
						<button type="submit" name="registrar" class="btn btn-outline-primary btn-block">Registrar</button>			
					</form>
				</div>
			</div>
		</div>
		<div class="col-1"></div>
	</div>
</div>