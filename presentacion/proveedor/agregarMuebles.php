<?php
include 'presentacion/validacionProveedor.php';
include 'presentacion/menuProveedor.php';

$error = 0;
if (isset($_POST['registrar'])) {  
   
    $descripcionM = $_POST['descripcion'];
    $tipoM = $_POST['tipo_mueble'];
    $materialM = $_POST['material'];
    $medidasM = $_POST['medidas'];
    $colorM = $_POST['color'];
    $paisM = $_POST['pais'];
    $provM = $_POST['proveedor'];
    $marcaM = $_POST['marca'];
    $existenciasM = $_POST['existencias'];
    $pesoM = $_POST['peso'];
    $precioM = $_POST['precio'];

    
    $nombreImg = $_FILES['fotoMueble']['name'];
    $rutaLocal = $_FILES['fotoMueble']['tmp_name'];
    $tipo = $_FILES['fotoMueble']['type'];
    
    if($tipo == "image/png" || $tipo == "image/jpeg"){
        $fecha = new DateTime();
        $rutaRemota = "imagenes/". $fecha ->getTimestamp() . (($tipo == "image/png")?".png":".jpg");
        copy($rutaLocal, $rutaRemota);     
        
        $mueble = new Mueble("", $descripcionM, $tipoM, $materialM, $medidasM, $pesoM, $colorM, $marcaM, $paisM, $precioM, $existenciasM, $rutaRemota, $provM, "1");
        $mueble -> insertar();
        
    }else{
        $error = 1;
    }
    
   /* echo $descripcionM . "<br>";
    echo $tipoM . "<br>";
    echo $materialM . "<br>";
    echo $medidasM . "<br>";
    echo $colorM . "<br>";
    echo $paisM . "<br>";
    echo $provM . "<br>";
    echo $marcaM . "<br>";
    echo $existenciasM . "<br>";
    echo $pesoM . "<br>";
    echo $precioM . "<br>";*/
    

}
?>

<div class="container mt-3">

<!-- Modal agregar material-->
<div class="modal fade" id="modalAgregarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmAgregarMaterial">
				<input type="text" hidden="" name="idTipoMueble" id="idTipoMueble">
				<label>Material: </label>
				<input type="text" name="material" id="material" class="form-control">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAgregarMaterial">Agregar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal agregar color-->
<div class="modal fade" id="modalAgregarColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmAgregarColor">
				<input type="text" hidden="" name="idTipoMueble" id="idTipoMueble">
				<label>Color: </label>
				<input type="text" name="color" id="color" class="form-control">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAgregarColor">Agregar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal agregar pais-->
<div class="modal fade" id="modalAgregarPais" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar pais</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmAgregarPais">
				<input type="text" hidden="" name="idTipoMueble" id="idTipoMueble">
				<label>Pais: </label>
				<input type="text" name="pais" id="pais" class="form-control">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAgregarPais">Agregar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal agregar marca-->
<div class="modal fade" id="modalAgregarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="frmAgregarMarca">
				<input type="text" hidden="" name="idTipoMueble" id="idTipoMueble">
				<label>Marca: </label>
				<input type="text" name="marca" id="marca" class="form-control">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAgregarMarca">Agregar</button>
      </div>
    </div>
  </div>
</div>

	<h3>Muebles</h3>
	<div class="row mt-3">
		<div class="col-12">
			<div class="card ">
				<div class="card-header bg-primary text-white">Agregar mueble</div>
				<div class="card-body">
				
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarMuebles.php") ?>" enctype="multipart/form-data">
					
						<div class="form-group">
							<label>Descripcion:</label> 
							<input name="descripcion" type="text" class="form-control" placeholder="Digite descripcion" required>
						</div>
						
  						<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Tipo de mueble:</label>
    						<div class="col-8">
      							<select class="form-control" name="tipo_mueble" id="selectTipoMueble">
									<?php
								    $tipoMueble = new TipoMueble();
								    $tiposMuebles = $tipoMueble -> consultarTodos();
								    foreach ($tiposMuebles as $tp){
								        echo "<option value='" . $tp -> getId() . "'>" . $tp -> getDescripcion() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col-2">
    						</div>
  						</div>
  						
  						<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Material:</label>
    						<div class="col-8">
      							<select class="form-control" name="material" id="selectMaterial">
									<?php
								    $material = new Material();
								    $materiales = $material -> consultarTodos();
								    foreach ($materiales as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col-2">
      							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaterial" id="btnModificarCliente">Agregar</button>
    						</div>
  						</div>
  						
  						<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Color:</label>
    						<div class="col-8">
      							<select class="form-control" name="color" id="selectColor">
									<?php
								    $color = new Color();
								    $colores = $color -> consultarTodos();
								    foreach ($colores as $c){
								        echo "<option value='" . $c -> getId() . "'>" . $c -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col-2">
      							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarColor" id="btnModificarCliente">Agregar</button>
    						</div>
  						</div>
  						
  						<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Pais:</label>
    						<div class="col-8">
      	      					<select class="form-control" name="pais" id="selectPais">
									<?php
								    $pais = new Pais();
								    $paises = $pais -> consultarTodos();
								    foreach ($paises as $p){
								        echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col-2">
      							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPais" id="btnModificarCliente">Agregar</button>
    						</div>
  						</div>
  						
  						<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Proveedor:</label>
    						<div class="col-8">
      	   						<select class="form-control" name="proveedor" id="selectProveedor">
									<?php
									   $perc = new PersonaContacto($_SESSION["id"]);
									   $perc ->consultar();
								       echo "<option value='" . $perc->getProveedor()->getId() . "'>" . $perc->getProveedor()->getNombre() . "</option>";
								    ?> 
								</select>
    						</div>
    						<div class="col-2">
      							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoMueble" id="btnModificarCliente">Agregar</button>
    						</div>
  						</div>
  						
  	
  	  					<div class="form-group row">
    						<label for="inputPassword" class="col-sm-2 col-form-label">Marca:</label>
    						<div class="col-8">
      							<select class="form-control" name="marca" id="selectMarca">
									<?php
								    $marca = new Marca();
								    $marcas = $marca -> consultarTodos();
								    foreach ($marcas as $m){
								        echo "<option value='" . $m -> getId() . "'>" . $m -> getNombre() . "</option>";
								    }
								    ?>
								</select>
    						</div>
    						<div class="col-2">
      							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca" id="btnModificarCliente">Agregar</button>
    						</div>
  						</div>

						
						<div class="form-row mb-3">
   							<div class="col-3">
								<label>Existencias:</label> 
								<input name="existencias" type="number" class="form-control" placeholder="Existencias" required>
    						</div>
    						<div class="col-3">
								<label>Peso:</label> 
								<input name="peso" type="text" class="form-control" placeholder="Peso" required>
    						</div>
    						<div class="col-3">
								<label>Medidas:</label> 
								<input name="medidas" type="text" class="form-control" placeholder="LargoxAnchoxAlto" required>
    						</div>
    						<div class="col-3">
								<label>Precio unitario:</label> 
								<input name="precio" type="number" class="form-control" placeholder="Precio" required>
    						</div>
  						</div>
  						
  						<div class="input-group mb-3">
 						 	<div class="custom-file">
    							<input type="file" name="fotoMueble" class="custom-file-input" id="inputGroupFile03">
    							<label class="custom-file-label" for="inputGroupFile03">Seleccione una imagen. El formato de la imagen debe ser .jpeg o .png</label>
  							</div>
						</div>
  						
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
					
					<?php 
					if (isset($_POST['registrar'])) {  
					   if ($error == 0) {
					?>    
					    <div class="alert alert-success" role="alert">
					    	Mueble registrado con exito
					    </div>	
					<?php 	 
					}else if ($error == 1) {
					?>
					    <div class="alert alert-warning" role="alert">
					    	El formato del archivo debe ser jpeg o png
					    </div>
					<?php 
					}else if ($error == 2) {
					?>
					    <div class="alert alert-warning" role="alert">
					   		El correo <?php echo $_POST['correo']?> ya existe
					    </div>
					<?php 
					   }
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
 	$("#selectTipoMueble").select2();
 	$("#selectMaterial").select2();
 	$("#selectColor").select2();
 	$("#selectPais").select2();
 	//$("#selectProveedor").select2();
 	$("#selectMarca").select2();
});
</script>


<script type="text/javascript">
$(document).ready(function(){
 	$("#btnAgregarMaterial").click(function (){
		$.ajax({
			type: "POST",
			data: "material=" + $("#material").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/agregarMaterialAjax.php");?>",
			success: function(res){
				alertify.success("Material agregado con exito");
			}
		});
 	 });

 	$("#btnAgregarColor").click(function (){
		$.ajax({
			type: "POST",
			data: "color=" + $("#color").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/agregarColorAjax.php");?>",
			success: function(res){
				alertify.success("Color agregado con exito");
			}
		});
 	 });

 	$("#btnAgregarPais").click(function (){
		$.ajax({
			type: "POST",
			data: "pais=" + $("#pais").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/agregarPaisAjax.php");?>",
			success: function(res){
				alertify.success("Pais agregado con exito");
			}
		});
 	 });

 	$("#btnAgregarMarca").click(function (){
		$.ajax({
			type: "POST",
			data: "marca=" + $("#marca").val(),
			url: "indexAjax.php?pid=<?php echo base64_encode("presentacion/proveedor/agregarMarcaAjax.php");?>",
			success: function(res){
				alertify.success("Marca agregada con exito");
			}
		});
 	 });
});
</script>
